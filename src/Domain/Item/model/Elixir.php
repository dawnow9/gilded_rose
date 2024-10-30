<?php

namespace App\Domain\Item\Model;

class Elixir extends Item
{
    public function __construct(int $sellIn, int $quality)
    {
        parent::__construct("Elixir of the Mongoose", $sellIn, $quality);
    }
}
