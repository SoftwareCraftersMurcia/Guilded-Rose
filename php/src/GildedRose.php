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
            $this->updateItemQuality(new DecoratedItem($item));
        }
    }

    private function updateItemQuality(DecoratedItem $decoratedItem): void
    {
        if ($decoratedItem->isNotAgedNeitherBackstage()) {
            if (($decoratedItem->item->quality > 0) && !$decoratedItem->isSulfuras()) {
                $decoratedItem->decrementQuality();
            }
        } elseif ($decoratedItem->item->quality < 50) {
            $decoratedItem->incrementQuality();
            if ($decoratedItem->isBackstage()) {
                if (($decoratedItem->item->sellIn < 11) && $decoratedItem->item->quality < 50) {
                    $decoratedItem->incrementQuality();
                }
                if (($decoratedItem->item->sellIn < 6) && $decoratedItem->item->quality < 50) {
                    $decoratedItem->incrementQuality();
                }
            }
        }

        if (!$decoratedItem->isSulfuras()) {
            $decoratedItem->decreaseSellIn();
        }

        if ($decoratedItem->item->sellIn < 0) {
            $this->negativeSellIn($decoratedItem);
        }
    }

    private function negativeSellIn(DecoratedItem $decoratedItem): void
    {
        if (!$decoratedItem->isAged()) {
            if (!$decoratedItem->isBackstage()) {
                if (($decoratedItem->item->quality > 0) && !$decoratedItem->isSulfuras()) {
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
