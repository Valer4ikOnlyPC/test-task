<?php

declare(strict_types=1);

namespace TestTask\CoreBundle\Command\Desadv;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use TestTask\Core\Context\Domain\Service\Desadv\CreatorFromFile\CreatorFromFileInterface;

class CreateDesadvFromFileCommand extends ContainerAwareCommand
{
    protected function configure(): void
    {
        $this->setName('core:desadv:create-from-file')
            ->setDescription('Create desadv from a file in the /files folder')
            ->addArgument(
                'fileName',
                InputArgument::REQUIRED,
                'file name from the files folder'
            )
            ->setHelp(
                <<<EOT
The <info>%command.name%</info> Create desadv from a file in the /files folder:

    <info>%command.full_name%</info>

EOT
            );
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output): ?int
    {
        $fileName = (string) $input->getArgument('fileName');

        /** @var CreatorFromFileInterface $service */
        $service = $this->getContainer()->get('test_task.domain.desadv.creator_from_file');
        $service->createFromLocalFile($fileName);

        return 0;
    }
}
