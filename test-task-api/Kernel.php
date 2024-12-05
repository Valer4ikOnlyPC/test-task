<?php

namespace TestTask\TestTaskApi;

use JMS\Serializer\SerializerBuilder;
use TestTask\Core\Common\Exception\InvalidArgumentException;
use TestTask\Core\Context\Application\Service\ApplicationServiceInterface;
use TestTask\Core\Context\Application\Service\RequestInterface;
use TestTask\Core\Context\Domain\Exception\ResourceByIdNotFoundException;
use ReflectionClass;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Loader\XmlFileLoader;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;

class Kernel
{
    /**
     * @var RouteCollection
     */
    protected $routes;

    public function __construct(string $configPath)
    {
        $this->init($configPath);
    }

    protected function init(string $configPath)
    {
        $this->setRoutes(
            (new XmlFileLoader(new FileLocator($configPath)))->load('routes.xml')
        );
    }

    protected function setRoutes(RouteCollection $routes): void
    {
        $this->routes = $routes;
    }

    protected function routes(): RouteCollection
    {
        return $this->routes;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     *
     * @throws \Throwable
     */
    public function send(Request $request): JsonResponse
    {
        $matcher = new UrlMatcher($this->routes(), (new RequestContext())->fromRequest($request));
        $parameters = $matcher->matchRequest($request);

        $request->attributes->add($parameters);
        unset($parameters['_route'], $parameters['_controller']);
        $request->attributes->set('_route_params', $parameters);

        $service = $this->getServiceFromRequest($request);

        $applicationRequest = $this->getApplicationRequestFromRequest($request);
        $applicationRequest = $this->convertObjectToWin($applicationRequest);

        $response = $service->execute($applicationRequest);
        $serializer = SerializerBuilder::create()->build();

        $response = $this->convertObjectToUTF8($response);

        $dataString = $serializer->serialize($response, 'json');

        return new JsonResponse($dataString);
    }

    public static function createResponseFromException(\Throwable $exception): JsonResponse
    {
        $code = 500;
        $message = $exception->getMessage();
        switch (get_class($exception)) {
            case ResourceNotFoundException::class:
            case MethodNotAllowedException::class:
                $code = 405;
                $message = 'Request method not supported';
                break;
            case InvalidArgumentException::class:
                $code = 400;
                break;
            case ResourceByIdNotFoundException::class:
                $code = 404;
                break;
        }

        return new JsonResponse(['error' => compact('code', 'message')], $code);
    }

    protected function getServiceFromRequest(Request $request): ApplicationServiceInterface
    {
        try {
            $serviceName = $request->attributes->get('_service');
            $service = \TestTask\Apps\Main\ServiceLocator::getService($serviceName);
        } catch (\Exception $e) {
            throw new NotFoundHttpException(
                sprintf(
                    'Unable to find the controller for path "%s". The route is wrongly configured.',
                    $request->getPathInfo()
                )
            );
        }

        return $service;
    }

    private function getApplicationRequestFromRequest(Request $request): RequestInterface
    {
        $serializer = SerializerBuilder::create()->build();
        $requestClass = $request->attributes->get('_request');

        switch (strtolower($request->getMethod())) {
            case 'get':
                $string = json_encode($request->query->all());
                break;
            case 'post':
            default:
                $string = $request->getContent();
        }

        return $serializer->deserialize($string, $requestClass, 'json');
    }

    /**
     * @template T object
     * @param T $object
     * @return T
     */
    private function convertObjectToWin(object $object): object
    {
        return $this->convertObject($object, 'windows-1251', 'utf-8');
    }

    /**
     * @template T object
     * @param T $object
     * @return T
     */
    private function convertObjectToUTF8(object $object): object
    {
        return $this->convertObject($object, 'utf-8', 'windows-1251');
    }

    private function convertObject(object $object, string $to, string $from): object
    {
        $reflection = new ReflectionClass(get_class($object));
        foreach ($reflection->getProperties() as $property) {
            $property->setAccessible(true);
            $value = $property->getValue($object);
            if (is_array($value)) {
                $property->setValue($object, $this->convertArray($value, $to, $from));
            }
            if (is_object($value)) {
                $property->setValue($object, $this->convertObject($value, $to, $from));
            }
            if (is_string($value)) {
                $property->setValue($object, mb_convert_encoding($value, $to, $from));
            }
        }
        return $object;
    }


    private function convertArray(array $items, string $to, string $from): array
    {
        $result = [];
        foreach ($items as $item) {
            if (is_array($item)) {
                $result[] = $this->convertArray($item, $to, $from);
                continue;
            }
            if (is_object($item)) {
                $result[] = $this->convertObject($item, $to, $from);
                continue;
            }
            if (is_string($item)) {
                $result[] = mb_convert_encoding($item, $to, $from);
                continue;
            }
            $result[] = $item;
        }

        return $result;
    }
}
