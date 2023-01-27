<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    public const NAME_SULFURAS = 'Sulfuras, Hand of Ragnaros';
    public const NAME_BACKSTAGE = 'Backstage passes to a TAFKAL80ETC concert';
    public const NAME_AGED = 'Aged Brie';

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
            $this->updateItemQuality(new DecoratedItem($item));
        }
    }

    private function updateItemQuality(DecoratedItem $decoratedItem): void
    {
        if ($decoratedItem->isNotAgedNeitherBackstage()) {
            if (($decoratedItem->item->quality > 0) && $decoratedItem->item->name !== self::NAME_SULFURAS) {
                $decoratedItem->decrementQuality();
            }
        } elseif ($decoratedItem->item->quality < 50) {
            $decoratedItem->incrementQuality();
            if ($decoratedItem->item->name === self::NAME_BACKSTAGE) {
                if (($decoratedItem->item->sellIn < 11) && $decoratedItem->item->quality < 50) {
                    $decoratedItem->incrementQuality();
                }
                if (($decoratedItem->item->sellIn < 6) && $decoratedItem->item->quality < 50) {
                    $decoratedItem->incrementQuality();
                }
            }
        }

        if ($decoratedItem->item->name !== self::NAME_SULFURAS) {
            --$decoratedItem->item->sellIn;
        }

        if ($decoratedItem->item->sellIn < 0) {
            $this->negativeSellIn($decoratedItem);
        }
    }

    private function negativeSellIn(DecoratedItem $decoratedItem): void
    {
        if ($decoratedItem->item->name !== self::NAME_AGED) {
            if ($decoratedItem->item->name !== self::NAME_BACKSTAGE) {
                if (($decoratedItem->item->quality > 0) && $decoratedItem->item->name !== self::NAME_SULFURAS) {
                    $decoratedItem->decrementQuality();
                }
            } else {
                $decoratedItem->resetQuality();
            }
        } elseif ($decoratedItem->item->quality < 50) {
            $decoratedItem->incrementQuality();
        }
    }
}
