<?php

namespace App\Domain\Item\Model;

use App\Common\Utils;

abstract class Item
{
    function __construct(
        public readonly string $name,
        private int $sellIn,
        private int $quality
    ) {
    }

    public function getQuality(): int
    {
        return $this->quality;
    }

    public function setQuality(int $quality): void
    {
        $this->quality = Utils::clamp(0, 50, $quality);
    }

    public function getSellIn(): int
    {
        return $this->sellIn;
    }

    public function decrementSellIn(): void
    {
        $this->sellIn--;
    }

    public function __toString(): string
    {
        return "{$this->name}, {$this->sellIn}, {$this->quality}";
    }
}
