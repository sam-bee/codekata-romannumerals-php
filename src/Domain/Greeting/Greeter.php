<?php

namespace RomanNumeralsKata\Domain\Greeting;

class Greeter
{
    public function getGreeting(Name $name): string
    {
        return sprintf('Hello, %s', $name);
    }
}
