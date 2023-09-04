<?php

namespace RomanNumeralsKata\Domain\NumeralConversion;

class NumeralConverter
{
    private const SYMBOL_MAP = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000,
    ];

    public function convert(RomanNumerals $romanNumerals): ArabicNumerals
    {
        $arabicNumerals = ArabicNumerals::fromZeroValue();
        $romanSymbols = $romanNumerals->getSymbols();
        $romanSymbolsInReverseOrder = array_reverse($romanSymbols);
        $previousValue = -1;

        foreach ($romanSymbolsInReverseOrder as $romanSymbol) {
            $currentSymbolValue = $this->convertSymbol($romanSymbol);

            if ($currentSymbolValue < $previousValue) {
                $arabicNumerals->subtract($currentSymbolValue);
            } else {
                $arabicNumerals->add($this->convertSymbol($romanSymbol));
            }
            $previousValue = $currentSymbolValue;
        }

        return $arabicNumerals;
    }

    private function convertSymbol(string $romanSymbol): int
    {
        return static::SYMBOL_MAP[$romanSymbol];
    }
}
