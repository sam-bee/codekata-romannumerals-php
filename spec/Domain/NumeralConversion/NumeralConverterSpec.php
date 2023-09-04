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
        $expectedResult = ArabicNumerals::fromValue('1');
        $actualResult = $this->convert($romanNumerals);
        $actualResult->shouldBeLike($expectedResult);
    }

    function it_can_convert_roman_numerals_with_more_than_one_character()
    {
        $romanNumerals = RomanNumerals::fromString('II');
        $expectedResult = ArabicNumerals::fromValue('2');
        $actualResult = $this->convert($romanNumerals);
        $actualResult->shouldBeLike($expectedResult);
    }
}
