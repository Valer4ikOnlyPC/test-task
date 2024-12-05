<?php

declare(strict_types=1);

namespace TestTask\CoreBundle\Command\NumberGeneration;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use TestTask\Core\Context\Domain\Service\NumberGeneration\NumberGenerationService\NumberGenerationInterface;

class NumberGenerationCommand extends ContainerAwareCommand
{
    protected function configure(): void
    {
        $this->setName('core:number-generation:generate')
            ->setDescription('generates a number')
            ->setHelp(
                <<<EOT
The <info>%command.name%</info>generates a number.:

    <info>%command.full_name%</info>

EOT
            );
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output): ?int
    {
        /** @var NumberGenerationInterface $service */
        $service = $this->getContainer()->get('test_task.domain.number_generation.number_generation_service');
        $number = $service->generate();
        $output->writeln(sprintf('Generated number: %s', $number));

        return 0;
    }
}
