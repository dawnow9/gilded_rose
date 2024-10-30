<?php

namespace Tests\Common;

use App\Common\Utils;
use PHPUnit\Framework\TestCase;

class UtilsTest extends TestCase
{
    public function testClampShouldClampToMaxValue(): void
    {
        //given
        $min = 0;
        $max = 50;
        $value = 100;

        //when
        $actual = Utils::clamp($min, $max, $value);

        //then
        self::assertEquals(50, $actual);
    }

    public function testClampShouldClampToMinValue(): void
    {
        //given
        $min = 0;
        $max = 50;
        $value = -100;

        //when
        $actual = Utils::clamp($min, $max, $value);

        //then
        self::assertEquals(0, $actual);
    }

    public function testClampShouldNotChangeValue(): void
    {
        //given
        $min = 0;
        $max = 50;
        $value = 25;

        //when
        $actual = Utils::clamp($min, $max, $value);

        //then
        self::assertEquals(25, $actual);
    }
}
