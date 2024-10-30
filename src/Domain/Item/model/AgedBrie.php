<?php

namespace App\Domain\Item\Model;

class AgedBrie extends Item
{
    public function __construct(int $sellIn, int $quality)
    {
        parent::__construct("Aged Brie", $sellIn, $quality);
    }
}
