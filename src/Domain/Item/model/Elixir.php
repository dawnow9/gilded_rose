<?php

namespace App\Domain\Item\Model;

class Elixir extends Item
{
    const NAME = "Elixir of the Mongoose";

    public function __construct(int $sellIn, int $quality)
    {
        parent::__construct(self::NAME, $sellIn, $quality);
    }
}
