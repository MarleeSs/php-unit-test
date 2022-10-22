<?php

namespace Punit\Test;

use PHPUnit\Framework\TestCase;

class MathTest extends TestCase
{
//    Tidak direkomendasikan karena manual
    public function testSum()
    {
        self::assertEquals(6, Math::sum([1, 2, 3]));
        self::assertEquals(7, Math::sum([1, 3, 3]));
        self::assertEquals(8, Math::sum([1, 4, 3]));
    }

//    Direkomendasikan karena otomatis

    /**
     * @dataProvider provideSum
     */
    public function testDataProvider(array $values, int $expected)
    {
        self::assertEquals($expected, Math::sum($values));
    }

    public function provideSum(): array
    {
        return [
            [[1, 2, 3], 6],
            [[1, 3, 3], 7],
            [[1, 4, 3], 8],
        ];
    }
}


