<?php

namespace RomanNumeralsKata\Domain\NumeralConversion;

class NumeralConverter
{
    private const SYMBOL_MAP = [
        'I' => 1,
        'V' => 5,
    ];

    public function convert(RomanNumerals $romanNumerals): ArabicNumerals
    {
        $arabicNumerals = ArabicNumerals::fromZeroValue();
        $romanSymbols = $romanNumerals->getSymbols();

        foreach ($romanSymbols as $romanSymbol) {
            $arabicNumerals->add($this->convertSymbol($romanSymbol));
        }

        return $arabicNumerals;
    }

    private function convertSymbol(string $romanSymbol): int
    {
        return static::SYMBOL_MAP[$romanSymbol];
    }
}
