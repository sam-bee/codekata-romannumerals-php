<?php

namespace spec\RomanNumeralsKata\Domain\NumeralConversion;

use PhpSpec\ObjectBehavior;
use RomanNumeralsKata\Domain\NumeralConversion\RomanNumerals;

class RomanNumeralsSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('fromString', ['VI']);
    }

    function it_can_return_individual_symbols()
    {
        $this->getSymbols()->shouldBe(['V', 'I']);
    }
}
