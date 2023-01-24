<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

final class GildedRoseTest extends TestCase
{
    public function testFixtures(): void
    {
        $items = [
            new Item('+5 Dexterity Vest', 10, 20),
            new Item('Aged Brie', 2, 0),
            new Item('Elixir of the Mongoose', 5, 7),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', -1, 80),
            new Item('Backstage passes to a TAFKAL80ETC concert', 15, 20),
            new Item('Backstage passes to a TAFKAL80ETC concert', 10, 49),
            new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49),
            // this conjured item does not work properly yet
            new Item('Conjured Mana Cake', 3, 6),
        ];

        $app = new GildedRose($items);

        $days = 31;
        $result = 'OMGHAI!' . PHP_EOL;
        for ($i = 0; $i < $days; $i++) {
            $result .= "-------- day ${i} --------" . PHP_EOL;
            $result .= 'name, sellIn, quality' . PHP_EOL;
            foreach ($items as $item) {
                $result .= $item . PHP_EOL;
            }
            $result .= PHP_EOL;
            $app->updateQuality();
        }

        $fixtureContent = file_get_contents(__DIR__ . '/fixtures.txt');

        self::assertSame($fixtureContent, $result);
    }
}
