package gildedrose;

import org.approvaltests.Approvals;
import org.approvaltests.combinations.CombinationApprovals;
import org.junit.jupiter.api.Test;
import org.lambda.utils.Range;

import static org.junit.jupiter.api.Assertions.assertEquals;

class GildedRoseTest {

    @Test
    void foo() {
        Item[] items = new Item[] { new Item("foo", 0, 0) };
        GildedRose app = new GildedRose(items);
        app.updateQuality();
        assertEquals("fixme", app.items[0].name);
    }

    @Test
    void approvalTest() {
        String[] names = {
            "+5 Dexterity Vest",
            "Aged Brie",
            "Elixir of the Mongoose",
            "Sulfuras, Hand of Ragnaros",
            "Backstage passes to a TAFKAL80ETC concert"
        };
        Integer[] sellIn = Range.get(-5, 15);
        Integer[] quality = Range.get(0, 50);

        CombinationApprovals.verifyAllCombinations(
            this::updateQuality,
            names,
            sellIn,
            quality
        );
    }

    private String updateQuality(String name, int sellIn, int quality) {
        Item[] items = new Item[] { new Item(name, sellIn, quality) };
        GildedRose app = new GildedRose(items);
        app.updateQuality();
        return items[0].toString();
    }

}