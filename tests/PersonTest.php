<?php

namespace Punit\Test;

use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
//    SetUp Function

    private Person $person;

    public function testSucces()
    {
        $this->assertEquals("Hello ayanggg Renii, Greetings from Marli", $this->person->sayGreetings("Marli"));
    }

    public function testException()
    {
        $this->expectException(\Exception::class);
        $this->person->sayGreetings(null);
    }

    public function testOutput()
    {
        $this->expectOutputString("Goodnight ayanggg Renii" . PHP_EOL);
        $this->person->sayGoodnight("ayanggg Renii");
    }

    protected function setUp(): void
    {
        $this->person = new Person("Renii");
    }


}