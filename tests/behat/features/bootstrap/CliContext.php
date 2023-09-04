<?php

namespace BehatContexts;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Step\Given;
use Behat\Step\When;
use Behat\Step\Then;
use PHPUnit\Framework\Assert;

class CliContext implements Context
{
    private string $name;
    /** @var string[] $result */
    private array $result = [];

    #[Given('my name is :name')]
    public function myNameIs(string $name): void
    {
        $this->name = $name;
    }

    #[When('I ask to be said hello to')]
    public function iAskToBeSaidHelloTo(): void
    {
        exec('php scripts/run.php hello ' . $this->name . ' 2>/dev/null', $this->result);
    }

    #[Then('I should see :expectedOutput')]
    public function iShouldSee(string $expectedOutput): void
    {
        Assert::assertEquals([$expectedOutput], $this->result);
    }

    #[Given('my Roman numerals are :romanNumerals')]
    public function myRomanNumeralsAre(string $romanNumerals): void
    {
        throw new PendingException();
    }

    #[When('I convert it to arabic numerals')]
    public function iConvertItToArabicNumerals(): void
    {
        throw new PendingException();
    }


    #[Then('I should get :expectedResult')]
    public function iShouldGet(string $expectedResult): void
    {
        throw new PendingException();
    }
}
