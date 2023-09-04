<?php

namespace RomanNumeralsKata\Domain\NumeralConversion;

class NumeralConverter
{
    public function convert(RomanNumerals $romanNumerals): ArabicNumerals
    {
        $romanSymbols = $romanNumerals->getSymbols();

        $numericalValue = 0;

        foreach ($romanSymbols as $romanSymbol) {
            ++$numericalValue;
        }

        return ArabicNumerals::fromValue($numericalValue);
    }
}
