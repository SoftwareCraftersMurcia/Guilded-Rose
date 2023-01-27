<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    private const NAME_SULFURAS = 'Sulfuras, Hand of Ragnaros';
    private const NAME_BACKSTAGE = 'Backstage passes to a TAFKAL80ETC concert';
    private const NAME_AGED = 'Aged Brie';

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
            $this->updateItemQuality($item);
        }
    }

    private function updateItemQuality(Item $item): void
    {
        if ($item->name !== self::NAME_AGED && $item->name !== self::NAME_BACKSTAGE) {
            if (($item->quality > 0) && $item->name !== self::NAME_SULFURAS) {
                --$item->quality;
            }
        } elseif ($item->quality < 50) {
            ++$item->quality;
            if ($item->name === self::NAME_BACKSTAGE) {
                if (($item->sellIn < 11) && $item->quality < 50) {
                    ++$item->quality;
                }
                if (($item->sellIn < 6) && $item->quality < 50) {
                    ++$item->quality;
                }
            }
        }

        if ($item->name !== self::NAME_SULFURAS) {
            --$item->sellIn;
        }

        if ($item->sellIn < 0) {
            $this->negativeSellIn($item);
        }
    }

    private function negativeSellIn(Item $item): void
    {
        if ($item->name !== self::NAME_AGED) {
            if ($item->name !== self::NAME_BACKSTAGE) {
                if (($item->quality > 0) && $item->name !== self::NAME_SULFURAS) {
                    --$item->quality;
                }
            } else {
                $item->quality = 0;
            }
        } elseif ($item->quality < 50) {
            ++$item->quality;
        }
    }
}
