<?php

declare(strict_types=1);

namespace GildedRose;

final class DecoratedItem
{
    public function __construct(
        public Item $item
    ) {
    }

    public function isNotAgedNeitherBackstage(): bool
    {
        return $this->item->name !== GildedRose::NAME_AGED
            && $this->item->name !== GildedRose::NAME_BACKSTAGE;
    }

    public function decrementQuality(): void
    {
        --$this->item->quality;
    }

    public function incrementQuality(): void
    {
        ++$this->item->quality;
    }

    public function resetQuality(): void
    {
        $this->item->quality = 0;
    }
}
