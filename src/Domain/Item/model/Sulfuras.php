<?php

namespace App\Domain\Item\Model;

class Sulfuras extends Item
{
    const name = "Sulfuras, Hand of Ragnaros";

    public function __construct(int $sellIn, int $quality)
    {
        parent::__construct(self::name, $sellIn, $quality);
    }
}
