<?php

namespace BehatContexts;

use Behat\Behat\Context\Context;
use Behat\Hook\BeforeScenario;
use Behat\Step\Given;
use Behat\Step\Then;
use Behat\Step\When;
use RomanNumeralsKata\Domain\Greeting\Name;
use RomanNumeralsKata\Domain\NumeralConversion\ArabicNumerals;
use RomanNumeralsKata\Domain\NumeralConversion\NumeralConverter;
use RomanNumeralsKata\Domain\NumeralConversion\RomanNumerals;
use RomanNumeralsKata\Domain\Greeting\Greeter as GreetingService;
use PHPUnit\Framework\Assert;

class ServiceLevelContext implements Context
{
    private Name $name;

    private string $result;

    private RomanNumerals $romanNumerals;

    private ArabicNumerals $arabicNumerals;

    private NumeralConverter $numeralConverter;

    #[BeforeScenario]
    public function setUp(): void
    {
        $this->numeralConverter = new NumeralConverter();
    }

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
        $this->romanNumerals = RomanNumerals::fromString($romanNumerals);
    }

    #[When('I convert it to arabic numerals')]
    public function iConvertItToArabicNumerals(): void
    {
        $this->arabicNumerals = $this->numeralConverter->convert($this->romanNumerals);
    }


    #[Then('I should get :expectedResult')]
    public function iShouldGet(string $expectedResult): void
    {
        $expectedResult = ArabicNumerals::fromString($expectedResult);
        $actualResult = $this->arabicNumerals;
        $same = $expectedResult->equals($actualResult);
        Assert::assertTrue($same);
    }
}
