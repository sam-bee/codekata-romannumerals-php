<?php

namespace spec\RomanNumeralsKata\Domain\NumeralConversion;

use PhpSpec\ObjectBehavior;
use RomanNumeralsKata\Domain\NumeralConversion\ArabicNumerals;

class ArabicNumeralsSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('fromValue', ['1997']);
    }

    function it_can_do_an_equality_check()
    {
        $same = ArabicNumerals::fromValue('1997');
        $different = ArabicNumerals::fromValue('1998');
        $this->equals($same)->shouldBe(true);
        $this->equals($different)->shouldBe(false);
    }

    function it_can_be_initialised_with_a_zero_value()
    {
        $this->beConstructedThrough('fromZeroValue', []);
        $zero = ArabicNumerals::fromValue('0');
        $this->equals($zero)->shouldBe(true);
    }

    function it_can_be_added_to()
    {
        $expectedResult = ArabicNumerals::fromValue(2000);
        $this->add(3);
        $this->shouldBeLike($expectedResult);
    }

    function it_can_be_subtracted_from()
    {
        $expectedResult = ArabicNumerals::fromValue(1994);
        $this->subtract(3);
        $this->shouldBeLike($expectedResult);
    }
}
