<?php

namespace YesCorpo\Bundle\SampleBundle\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'sample:is-valid',
    description: 'Add a short description for your command',
)]
class IsValidCommand extends Command
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('name', InputArgument::OPTIONAL, 'Name of the result')
            ->addOption('isValid', null, InputOption::VALUE_OPTIONAL, 'Option is valid', false)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        if (!$input->getOption('isValid')) {
            $io->note('This command is fail');
            
            return Command::FAILURE;
        }

        $name = $input->getArgument('name');
        if ($name) {
            $io->note(sprintf('This command is successful : %s', $name));
        } else {
            $io->note('This command is successful');
        }

        return Command::SUCCESS;
    }
}
