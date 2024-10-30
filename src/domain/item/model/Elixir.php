<?php

namespace App\domain\item\model;

class Elixir extends Item
{
    public function __construct(int $sellIn, int $quality)
    {
        parent::__construct("Elixir of the Mongoose", $sellIn, $quality);
    }

    public function update(): void
    {
        // TODO: Implement update() method.
    }
}
