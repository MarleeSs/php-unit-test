<?php

namespace Punit\Test;

use PHPUnit\Framework\TestCase;

class StaticCountTest extends TestCase
{

    // #Static
    static private Counter $counter;

//    setUpBeforeClass() #Static
    public static function setUpBeforeClass(): void
    {
        self::$counter = new Counter();
    }


    //    Inharitance Test

    public static function tearDownAfterClass(): void
    {
        echo "END OF UNIT TEST";
    }

    public function testIncrement()
    {
        self::assertEquals(0, self::$counter->getCounter());
        self::markTestSkipped('Skipp 1 :Pusyingg');
//        self::markTestIncomplete("Belum Selesai");
    }


    public function testFirst()
    {
        self::$counter->increment();
        self::assertEquals(1, self::$counter->getCounter());
        return self::$counter;
    }

    /**
     * @depends testFirst
     *
     * @return void
     */
    public function testSecond(Counter $counter)
    {
        self::$counter->increment();
        self::assertEquals(2, self::$counter->getCounter());
    }

// ===========================================================================================
//
////    Non Static
//    private Counter $counter;
//
//    public function testFirst()
//    {
//        $this->counter->increment();
//        self::assertEquals(1, $this->counter->getCounter());
//        return $this->counter;
//    }
//
//    //    Inharitance Test
//
//    /**
//     * @depends testFirst
//     *
//     * @return void
//     */
//    public function testSecond(Counter $counter)
//    {
//        $this->counter->increment();
//        self::assertEquals(2, $this->counter->getCounter());
//    }
//
//    // Setup (Non-Static)
//    protected function setUp(): void
//    {
//        $this->counter = new Counter();
//    }
}
