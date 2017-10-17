<?php

namespace App\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ExampleCommand extends AbstractCommand
{
    protected function configure()
    {
        $this
            ->setName('app:example')
            ->setDescription('Example command description')
            ->setHelp('Example command help')
            ->addArgument('ex-arg', InputArgument::REQUIRED, 'Example argument')
            ->addOption('ex-opt', 'o', InputOption::VALUE_OPTIONAL, 'Example option', false);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // ...
    }
}

