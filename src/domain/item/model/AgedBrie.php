<?php

namespace App\domain\item\model;

class AgedBrie extends Item
{
    public function __construct(int $sellIn, int $quality)
    {
        parent::__construct("Aged Brie", $sellIn, $quality);
    }

    public function update(): void
    {
        // TODO: Implement update() method.
    }
}
