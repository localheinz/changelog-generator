<?php

namespace Localheinz\GitHub\ChangeLog\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input;

class ChangeLogCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('localheinz:changelog')
            ->setDescription('Creates a changelog based on references')
            ->addArgument(
                'vendor',
                Input\InputArgument::REQUIRED,
                'The name of the vendor, e.g., "localheinz"'
            )
            ->addArgument(
                'package',
                Input\InputArgument::REQUIRED,
                'The name of the package, e.g. "github-changelog"'
            )
            ->addArgument(
                'start',
                Input\InputArgument::REQUIRED,
                'The start reference, e.g. "1.0.0"'
            )
            ->addArgument(
                'end',
                Input\InputArgument::REQUIRED,
                'The end reference, e.g. "1.1.0"'
            )
            ->addOption(
                'token',
                't',
                Input\InputOption::VALUE_OPTIONAL,
                'The GitHub token'
            )
        ;
    }
}
