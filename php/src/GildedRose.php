<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    const AGED_BRIE = 'Aged Brie';
    const BACKSTAGE_PASSES = 'Backstage passes to a TAFKAL80ETC concert';
    const SULFURAS = 'Sulfuras, Hand of Ragnaros';
    const MAX_QUALITY = 50;
    const MIN_QUALITY = 0;

    /**
     * @param Item[] $items
     */
    public function __construct(
        private array $items
    ) {
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            if ($item->name === self::SULFURAS) {
                continue;
            }

            if (!$this->agedProducts($item)) {
                $this->decreaseQuality($item);
            } elseif ($item->quality < self::MAX_QUALITY) {
                ++$item->quality;
                if ($item->name == self::BACKSTAGE_PASSES) {
                    if ($item->sellIn < 11) {
                        $this->increaseItemQualityByOne($item);
                    }
                    if ($item->sellIn < 6) {
                        $this->increaseItemQualityByOne($item);
                    }
                }
            }

            $this->decreaseSellIn($item);

            if ($item->sellIn < 0) {
                if ($item->name == self::AGED_BRIE) {
                    $this->increaseItemQualityByOne($item);
                    continue;
                }

                if ($item->name == self::BACKSTAGE_PASSES) {
                    $item->quality = self::MIN_QUALITY;
                    continue;
                }

                $this->decreaseQuality($item);
            }
        }
    }

    public function increaseItemQualityByOne(Item $item): void
    {
        if ($item->quality < self::MAX_QUALITY) {
            ++$item->quality;
        }
    }

    public function decreaseSellIn(Item $item): void
    {
            --$item->sellIn;
    }

    private function agedProducts(Item $item): bool
    {
        return $item->name === self::AGED_BRIE || $item->name === self::BACKSTAGE_PASSES;
    }

    public function decreaseQuality(Item $item): void
    {
        if ($item->quality > self::MIN_QUALITY) {
            --$item->quality;
        }
    }
}
