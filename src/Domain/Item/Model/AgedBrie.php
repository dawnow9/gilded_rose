<?php

namespace App\Domain\Item\Model;

class AgedBrie extends Item
{
    const NAME = "Aged Brie";

    public function __construct(int $sellIn, int $quality)
    {
        parent::__construct(self::NAME, $sellIn, $quality);
    }
}
