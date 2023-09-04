<?php

namespace RomanNumeralsKata\Domain\NumeralConversion;

class ArabicNumerals
{
    private function __construct(private int $value)
    {
    }

    public static function fromValue(int|string $value): static
    {
        return new static($value);
    }

    public static function fromZeroValue(): static
    {
        return new static(0);
    }

    public function equals(ArabicNumerals $another): bool
    {
        return $this->value == $another->value;
    }

    public function add(int $valueToAdd): void
    {
        $this->value += $valueToAdd;
    }

    public function subtract(int $valueToSubtract): void
    {
        $this->value -= $valueToSubtract;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
