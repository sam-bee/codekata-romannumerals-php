<?php

namespace BehatContexts;

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
}
