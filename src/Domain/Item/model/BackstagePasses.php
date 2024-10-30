<?php

namespace App\Domain\Item\Model;

class BackstagePasses extends Item
{
    public function __construct(int $sellIn, int $quality)
    {
        parent::__construct(
            "Backstage passes to a TAFKAL80ETC concert",
            $sellIn,
            $quality
        );
    }
}
