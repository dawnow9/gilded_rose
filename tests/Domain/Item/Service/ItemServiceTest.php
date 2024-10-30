<?php

namespace Tests\Domain\Item\Service;

use App\Domain\Item\Model\AgedBrie;
use App\Domain\Item\Model\BackstagePasses;
use App\Domain\Item\Model\Elixir;
use App\Domain\Item\Model\Sulfuras;
use App\Domain\Item\Service\ItemService;
use PHPUnit\Framework\TestCase;

class ItemServiceTest extends TestCase
{
    private ItemService $itemService;

    public function setUp(): void
    {
        parent::setUp();

        $this->itemService = new ItemService();
    }

    public function testAgedBrieBeforeSellInDate(): void
    {
        //given
        $item = new AgedBrie(10, 10);

        //when
        $this->itemService->update($item);

        //then
        self::assertEquals(9, $item->getSellIn());
        self::assertEquals(11, $item->getQuality());
    }

    public function testAgedBrieSellInDate(): void
    {
        //given
        $item = new AgedBrie(0, 10);

        //when
        $this->itemService->update($item);

        //then
        self::assertEquals(-1, $item->getSellIn());
        self::assertEquals(12, $item->getQuality());
    }

    public function testAgedBrieAfterSellInDate(): void
    {
        //given
        $item = new AgedBrie(-5, 10);

        //when
        $this->itemService->update($item);

        //then
        self::assertEquals(-6, $item->getSellIn());
        self::assertEquals(12, $item->getQuality());
    }

    public function testAgedBrieBeforeSellInDateWithMaximumQuality(): void
    {
        //given
        $item = new AgedBrie(5, 50);

        //when
        $this->itemService->update($item);

        //then
        self::assertEquals(4, $item->getSellIn());
        self::assertEquals(50, $item->getQuality());
    }

    public function testAgedBrieSellInDateNearMaximumQuality(): void
    {
        //given
        $item = new AgedBrie(0, 49);

        //when
        $this->itemService->update($item);

        //then
        self::assertEquals(-1, $item->getSellIn());
        self::assertEquals(50, $item->getQuality());
    }

    public function testAgedBrieSellInDateWithMaximumQuality(): void
    {
        //given
        $item = new AgedBrie(0, 50);

        //when
        $this->itemService->update($item);

        //then
        self::assertEquals(-1, $item->getSellIn());
        self::assertEquals(50, $item->getQuality());
    }

    public function testAgedBrieAfterSellInDateWithMaximumQuality(): void
    {
        //given
        $item = new AgedBrie(-10, 50);

        //when
        $this->itemService->update($item);

        //then
        self::assertEquals(-11, $item->getSellIn());
        self::assertEquals(50, $item->getQuality());
    }

    public function testBackstagePassesBeforeSellInDate(): void
    {
        //given
        $item = new BackstagePasses(10, 10);

        //when
        $this->itemService->update($item);

        //then
        self::assertEquals(9, $item->getSellIn());
        self::assertEquals(12, $item->getQuality());
    }

    public function testBackstagePassesMoreThan10DaysBeforeSellInDate(): void
    {
        //given
        $item = new BackstagePasses(11, 10);

        //when
        $this->itemService->update($item);

        //then
        self::assertEquals(10, $item->getSellIn());
        self::assertEquals(11, $item->getQuality());
    }

    public function testBackstagePassesFiveDaysBeforeSellInDate(): void
    {
        //given
        $item = new BackstagePasses(5, 10);

        //when
        $this->itemService->update($item);

        //then
        self::assertEquals(4, $item->getSellIn());
        self::assertEquals(13, $item->getQuality());
    }

    public function testBackstagePassesSellInDate(): void
    {
        //given
        $item = new BackstagePasses(0, 10);

        //when
        $this->itemService->update($item);

        //then
        self::assertEquals(-1, $item->getSellIn());
        self::assertEquals(0, $item->getQuality());
    }

    public function testBackstagePassesCloseToSellInDateWithMaximumQuality(): void
    {
        //given
        $item = new BackstagePasses(10, 50);

        //when
        $this->itemService->update($item);

        //then
        self::assertEquals(9, $item->getSellIn());
        self::assertEquals(50, $item->getQuality());
    }

    public function testBackstagePassesVeryCloseToSellInDateWithMaximumQuality(): void
    {
        //given
        $item = new BackstagePasses(5, 50);

        //when
        $this->itemService->update($item);

        //then
        self::assertEquals(4, $item->getSellIn());
        self::assertEquals(50, $item->getQuality());
    }

    public function testBackstagePassesAfterSellInDate(): void
    {
        //given
        $item = new BackstagePasses(-5, 50);

        //when
        $this->itemService->update($item);

        //then
        self::assertEquals(-6, $item->getSellIn());
        self::assertEquals(0, $item->getQuality());
    }

    public function testSulfurasBeforeSellInDate(): void
    {
        //given
        $item = new Sulfuras(10, 80);

        //when
        $this->itemService->update($item);

        //then
        self::assertEquals(10, $item->getSellIn());
        self::assertEquals(80, $item->getQuality());
    }

    public function testSulfurasSellInDate(): void
    {
        //given
        $item = new Sulfuras(0, 80);

        //when
        $this->itemService->update($item);

        //then
        self::assertEquals(0, $item->getSellIn());
        self::assertEquals(80, $item->getQuality());
    }

    public function testSulfurasAfterSellInDate(): void
    {
        //given
        $item = new Sulfuras(-1, 80);

        //when
        $this->itemService->update($item);

        //then
        self::assertEquals(-1, $item->getSellIn());
        self::assertEquals(80, $item->getQuality());
    }

    public function testElixirOfTheMongooseBeforeSellInDate(): void
    {
        //given
        $item = new Elixir(10, 10);

        //when
        $this->itemService->update($item);

        //then
        self::assertEquals(9, $item->getSellIn());
        self::assertEquals(9, $item->getQuality());
    }

    public function testElixirOfTheMongooseSellInDate(): void
    {
        //given
        $item = new Elixir(0, 10);

        //when
        $this->itemService->update($item);

        //then
        self::assertEquals(-1, $item->getSellIn());
        self::assertEquals(8, $item->getQuality());
    }
}
