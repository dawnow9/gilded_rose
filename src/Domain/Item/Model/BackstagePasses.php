<?php

namespace App\Domain\Item\Model;

class BackstagePasses extends Item
{
    const NAME = "Backstage passes to a TAFKAL80ETC concert";

    public function __construct(int $sellIn, int $quality)
    {
        parent::__construct(self::NAME, $sellIn, $quality);
    }
}
