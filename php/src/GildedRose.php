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

    private function updateItemQuality(DecoratedItem $item): void
    {
        if ($item->shouldDecrementQuality()) {
            $item->decrementQuality();
        } elseif ($item->hasTooLowQuality()) {
            $item->incrementQuality();
            if ($item->isBackstage()) {
                if ($item->item->sellIn < 11 && $item->hasTooLowQuality()) {
                    $item->incrementQuality();
                }
                if (($item->item->sellIn < 6) && $item->hasTooLowQuality()) {
                    $item->incrementQuality();
                }
            }
        }

        if (!$item->isSulfuras()) {
            $item->decreaseSellIn();
        }

        if ($item->item->sellIn < 0) {
            $this->negativeSellIn($item);
        }
    }

    private function negativeSellIn(DecoratedItem $item): void
    {
        if ($item->shouldDecrementQuality()) {
            $item->decrementQuality();
        }

        if ($item->shouldResetQuality()) {
            $item->resetQuality();
        }

        if ($item->hasTooLowQuality() && $item->isAged()) {
            $item->incrementQuality();
        }
    }
}
