<?php

namespace RomanNumeralsKata\Application;

use RomanNumeralsKata\Domain\Greeting\Greeter;
use RomanNumeralsKata\Domain\Greeting\Name;
use Symfony\Component\Console\Command\Command as SymfonyConsoleCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GreetingCommand extends SymfonyConsoleCommand
{
    public function __construct(private Greeter $greeter)
    {
        parent::__construct();
    }

    public function configure(): void
    {
        $this
            ->setName('hello')
            ->addArgument('name', InputArgument::REQUIRED)
        ;
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $nameString = $input->getArgument('name');
        $name = new Name($nameString);
        $greeting = $this->greeter->getGreeting($name);
        $output->writeln($greeting);
        return 0;
    }
}
