<?php

namespace App\Domain\Item\Model;

class Sulfuras extends Item
{
    public function __construct(int $sellIn, int $quality)
    {
        parent::__construct("Sulfuras, Hand of Ragnaros", $sellIn, $quality);
    }
}
