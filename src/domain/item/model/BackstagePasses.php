<?php

namespace App\domain\item\model;

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

    public function update(): void
    {
        // TODO: Implement update() method.
    }
}
