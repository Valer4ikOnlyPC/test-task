<?php

declare(strict_types=1);

namespace TestTask\CoreBundle\DependencyInjection;

use Composer\Autoload\ClassLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use TestTask\Core\Context\Infrastructure\Persistence\Doctrine\Type\Desadv\DoctrineDesadvID;
use TestTask\CoreBundle\Exception\LogicException;

class CoreExtension extends Extension implements PrependExtensionInterface
{
    public function prepend(ContainerBuilder $container): void
    {
        $bundles = $container->getParameter('kernel.bundles');

        if (! isset($bundles['DoctrineBundle'])) {
            throw new LogicException(
                'The DoctrineBundle is not registered in your application. Try running "composer require doctrine/doctrine-bundle".'
            );
        }

        /** @var string $composerLoaderFilename */
        $composerLoaderFilename = (new \ReflectionClass(ClassLoader::class))->getFileName();
        $vendorPath = dirname($composerLoaderFilename);
        /** @noinspection PhpIncludeInspection */
        $psr4PathsMap = require "$vendorPath/autoload_psr4.php";
        $corePath = reset($psr4PathsMap['TestTask\\Core\\']);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('parameters.xml');

        foreach ($container->getExtensions() as $extensionName => $extensionConfigs) {
            switch ($extensionName) {
                case 'doctrine':
                    $config = [
                        'dbal' => [
                            'default-connection' => 'test_task',
                            'connection' => [
                                'name' => 'test_task',
                                'dbname' => '%env.test_task.db_database%',
                                'user' => '%env.test_task.db_user%',
                                'password' => '%env.test_task.db_password%',
                                'host' => '%env.test_task.db_host%',
                                'port' => '%env.test_task.db_port%',
                                'driver' => '%env.test_task.db_driver%',
                                'server_version' => '%env.test_task.db_server_version%',
                            ],
                            'type' => $this->doctrineTypes(),
                        ],
                        'orm' => [
                            'default-entity-manager' => 'test_task',
                            'entity-managers' => [
                                'test_task' => [
                                    'mappings' => [
                                        'Core/Context/Domain' => [
                                            'prefix' => 'TestTask\Core\Context\Domain',
                                            'dir' => "$corePath/Context/Infrastructure/Persistence/Doctrine/Mapping/Domain",
                                            'is-bundle' => false,
                                            'type' => 'xml',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ];
                    $container->prependExtensionConfig($extensionName, $config);
                    break;
                case 'doctrine_migrations':
                    $config = [
                        'dir_name' => "$corePath/Context/Infrastructure/Persistence/Doctrine/Migration",
                        'namespace' => 'TestTask\Core\Context\Infrastructure\Persistence\Doctrine\Migration',
                    ];
                    $container->prependExtensionConfig($extensionName, $config);
                    break;
            }
        }
    }

    /**
     * @param mixed[] $configs
     *
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));

        $files = [
            'repo/entity_manager.xml',
            'repo/repo.xml',
            'service/service_desadv.xml',
            'service/service_number_generation.xml',
            'command/command.xml',
        ];

        foreach ($files as $file) {
            $loader->load($file);
        }
    }

    /**
     * @return array<int, mixed>
     */
    private function doctrineTypes(): array
    {
        $types = [
            DoctrineDesadvID::class,
        ];

        return array_map(
            static function (string $typeClassName) {
                return [
                    'name' => $typeClassName::NAME,
                    'value' => $typeClassName,
                ];
            },
            $types
        );
    }
}
