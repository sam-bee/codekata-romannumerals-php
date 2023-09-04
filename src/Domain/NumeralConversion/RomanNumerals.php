<?php

namespace RomanNumeralsKata\Domain\NumeralConversion;

class RomanNumerals
{
    private function __construct(private readonly string $value)
    {
    }

    public static function fromString(string $value): static
    {
        return new static($value);
    }

    public function getSymbols()
    {
        return str_split($this->value);
    }
}
