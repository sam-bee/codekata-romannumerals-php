<?php

namespace RomanNumeralsKata\Domain\NumeralConversion;

class ArabicNumerals
{
    private function __construct(private readonly int $value)
    {
    }

    public static function fromValue(string $value): static
    {
        return new static($value);
    }

    public function equals(ArabicNumerals $another)
    {
        return $this->value == $another->value;
    }
}
