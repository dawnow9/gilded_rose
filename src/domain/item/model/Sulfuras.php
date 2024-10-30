<?php

namespace App\domain\item\model;

class Sulfuras extends Item
{
    public function __construct(int $sellIn, int $quality)
    {
        parent::__construct("Sulfuras, Hand of Ragnaros", $sellIn, $quality);
    }

    public function update(): void
    {
        // TODO: Implement update() method.
    }
}
