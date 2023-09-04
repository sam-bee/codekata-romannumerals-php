<?php

namespace RomanNumeralsKata\Application;

use RomanNumeralsKata\Domain\Greeting\Greeter;
use RomanNumeralsKata\Domain\Greeting\Name;
use RomanNumeralsKata\Domain\NumeralConversion\NumeralConverter;
use RomanNumeralsKata\Domain\NumeralConversion\RomanNumerals;
use Symfony\Component\Console\Command\Command as SymfonyConsoleCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ConvertCommand extends SymfonyConsoleCommand
{
    public function __construct(private readonly NumeralConverter $numeralConverter)
    {
        parent::__construct();
    }

    public function configure(): void
    {
        $this
            ->setName('convert')
            ->addArgument('roman-numerals', InputArgument::REQUIRED)
        ;
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $romanNumeralsArg = $input->getArgument('roman-numerals');
        $romanNumerals = RomanNumerals::fromString($romanNumeralsArg);
        $arabicNumerals = $this->numeralConverter->convert($romanNumerals);
        $output->writeln($arabicNumerals);
        return 0;
    }
}
