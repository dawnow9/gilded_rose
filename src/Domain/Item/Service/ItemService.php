<?php

namespace App\Domain\Item\Service;

use App\Domain\Item\Model\AgedBrie;
use App\Domain\Item\Model\BackstagePasses;
use App\Domain\Item\Model\Elixir;
use App\Domain\Item\Model\Item;

class ItemService
{
    public function update(Item $item): void
    {
        switch (get_class($item)) {
            case AgedBrie::class:
                $this->updateAgedBrie($item);
                break;
            case BackstagePasses::class:
                $this->updateBackstagePasses($item);
                break;
            case Elixir::class:
                $this->updateElixir($item);
                break;
        }
    }

    private function updateAgedBrie(Item $item): void
    {
        $quality = $item->getQuality();

        if ($item->getSellIn() <= 0) {
            $item->setQuality($quality + 2);
        } else {
            $item->setQuality($quality + 1);
        }

        $item->decrementSellIn();
    }

    private function updateBackstagePasses(Item $item): void
    {
        $quality = $item->getQuality();

        if ($item->getSellIn() <= 0) {
            $item->setQuality(0);
        } elseif ($item->getSellIn() <= 5) {
            $item->setQuality($quality + 3);
        } elseif ($item->getSellIn() <= 10) {
            $item->setQuality($quality + 2);
        } else {
            $item->setQuality($quality + 1);
        }

        $item->decrementSellIn();
    }

    private function updateElixir(Item $item): void
    {
        $quality = $item->getQuality();

        if ($item->getSellIn() <= 0) {
            $item->setQuality($quality - 2);
        } else {
            $item->setQuality($quality - 1);
        }

        $item->decrementSellIn();
    }
}
