<?php

namespace RomanNumeralsKata\Domain\Greeting;

class Name
{
    public function __construct(private readonly string $nameAsString)
    {
    }

    public function __toString(): string
    {
        return $this->nameAsString;
    }
}
