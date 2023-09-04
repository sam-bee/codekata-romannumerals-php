<?php

namespace spec\RomanNumeralsKata\Domain\NumeralConversion;

use PhpSpec\ObjectBehavior;
use RomanNumeralsKata\Domain\NumeralConversion\ArabicNumerals;
use RomanNumeralsKata\Domain\NumeralConversion\NumeralConverter;
use RomanNumeralsKata\Domain\NumeralConversion\RomanNumerals;

class NumeralConverterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(NumeralConverter::class);
    }

    function it_can_do_a_simple_conversion()
    {
        $romanNumerals = RomanNumerals::fromString('I');
        $expectedResult = ArabicNumerals::fromString('1');
        $actualResult = $this->convert($romanNumerals);
        $actualResult->shouldBeLike($expectedResult);
    }
}
