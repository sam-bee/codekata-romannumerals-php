<?php

namespace BehatContexts;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Step\Given;
use Behat\Step\Then;
use Behat\Step\When;
use RomanNumeralsKata\Domain\Greeting\Name;
use RomanNumeralsKata\Domain\Greeting\Greeter as GreetingService;
use PHPUnit\Framework\Assert;

class ServiceLevelContext implements Context
{
    private Name $name;

    private string $result;

    #[Given('my name is :name')]
    public function myNameIs(string $name): void
    {
        $this->name = new Name($name);
    }

    #[When('I ask to be said hello to')]
    public function iAskToBeSaidHelloTo(): void
    {
        $helloService = new GreetingService();
        $this->result = $helloService->getGreeting($this->name);
    }

    #[Then('I should see :expectedOutput')]
    public function iShouldSee(string $expectedOutput): void
    {
        Assert::assertEquals($expectedOutput, $this->result);
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
