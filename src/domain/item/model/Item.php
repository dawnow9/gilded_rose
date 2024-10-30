<?php

namespace App\domain\item\model;

abstract class Item
{
    function __construct(
        public readonly string $name,
        public int $sellIn,
        public int $quality
    ) {
    }

    abstract function update(): void;

    public function __toString()
    {
        return "{$this->name}, {$this->sellIn}, {$this->quality}";
    }
}
