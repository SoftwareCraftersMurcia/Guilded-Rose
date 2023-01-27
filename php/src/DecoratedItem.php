<?php

declare(strict_types=1);

namespace GildedRose;

final class DecoratedItem
{
    public function __construct(
        public Item $item
    ) {
    }
}
