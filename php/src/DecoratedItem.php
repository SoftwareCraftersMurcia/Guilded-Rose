<?php

declare(strict_types=1);

namespace GildedRose;

final class DecoratedItem
{
    private const NAME_SULFURAS = 'Sulfuras, Hand of Ragnaros';
    private const NAME_BACKSTAGE = 'Backstage passes to a TAFKAL80ETC concert';
    private const NAME_AGED = 'Aged Brie';

    public function __construct(
        public Item $item
    ) {
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

    public function decreaseSellIn(): void
    {
        --$this->item->sellIn;
    }

    public function isSulfuras(): bool
    {
        return $this->item->name === self::NAME_SULFURAS;
    }

    public function isBackstage(): bool
    {
        return $this->item->name === self::NAME_BACKSTAGE;
    }

    public function isAged(): bool
    {
        return $this->item->name === self::NAME_AGED;
    }

    public function shouldDecrementQuality(): bool
    {
        return $this->item->quality > 0
            && !$this->isAged()
            && !$this->isBackstage()
            && !$this->isSulfuras();
    }

    public function shouldResetQuality(): bool
    {
        return !$this->isAged()
            && $this->isBackstage();
    }
}
