<?php

namespace App\Common;

class Utils
{
    public static function clamp(int $min, int $max, int $value): int
    {
        return max($min, min($max, $value));
    }
}
