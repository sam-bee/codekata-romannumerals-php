<?php

namespace RomanNumeralsKata\Domain\NumeralConversion;

class NumeralConverter
{
    public function convert(RomanNumerals $romanNumerals): ArabicNumerals
    {
        return ArabicNumerals::fromString('1');
    }
}
