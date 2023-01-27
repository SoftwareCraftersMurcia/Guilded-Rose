<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
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
        if ($item->name !== 'Aged Brie' && $item->name !== 'Backstage passes to a TAFKAL80ETC concert') {
            if (($item->quality > 0) && $item->name !== 'Sulfuras, Hand of Ragnaros') {
                --$item->quality;
            }
        } elseif ($item->quality < 50) {
            ++$item->quality;
            if ($item->name === 'Backstage passes to a TAFKAL80ETC concert') {
                if (($item->sellIn < 11) && $item->quality < 50) {
                    ++$item->quality;
                }
                if (($item->sellIn < 6) && $item->quality < 50) {
                    ++$item->quality;
                }
            }
        }

        if ($item->name !== 'Sulfuras, Hand of Ragnaros') {
            --$item->sellIn;
        }

        if ($item->sellIn < 0) {
            if ($item->name !== 'Aged Brie') {
                if ($item->name !== 'Backstage passes to a TAFKAL80ETC concert') {
                    if (($item->quality > 0) && $item->name !== 'Sulfuras, Hand of Ragnaros') {
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
}
