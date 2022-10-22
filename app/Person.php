<?php

namespace Punit\Test;

class Person
{
    public function __construct(private string $name)
    {
    }

    public function sayGreetings(?string $name)
    {
        if ($name === null) throw new  \Exception("name is null");
        return "Hello $this->name, Greetings from $name";
    }

    public function sayGoodnight(?string $name)
    {
        echo "Goodnight $this->name" . PHP_EOL;
    }
}