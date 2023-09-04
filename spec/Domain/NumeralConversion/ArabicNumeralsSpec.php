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
}
