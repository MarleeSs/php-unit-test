<?php

namespace Punit\Test;

use PHPUnit\Framework\TestCase;

class CountTest extends TestCase
{
    public function testIncrement()
    {
        $counter = new Counter();
        $counter->increment();
        $counter->increment();
        self::assertEquals(2, $counter->getCounter());
    }

    /**
     * @test
     */
    public function increment()
    {
        $counter = new Counter();
        $counter->increment();
        $counter->increment();
        self::assertEquals(2, $counter->getCounter());
    }

    //    Inharitance Test
    public function testFirst()
    {
        $counter = new Counter();
        $counter->increment();
        self::assertEquals(1, $counter->getCounter());
        return $counter;
    }

    /**
     * @depends testFirst
     *
     * @return void
     */
    public function testSecond(Counter $counter)
    {
        $counter->increment();
        self::assertEquals(2, $counter->getCounter());
    }
}