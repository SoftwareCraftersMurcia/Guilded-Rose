package gildedrose

import org.approvaltests.combinations.CombinationApprovals
import org.junit.jupiter.api.Assertions.assertEquals
import org.junit.jupiter.api.Test
import org.lambda.utils.Range

internal class GildedRoseTest {

    @Test
    fun foo() {
        val items = arrayOf<Item>(Item("foo", 0, 0))
        val app = GildedRose(items)
        app.updateQuality()
        assertEquals("fixme", app.items[0].name)
    }

    @Test
    fun approvalsTest() {
        val names = arrayOf(
            "+5 Dexterity Vest",
            "Aged Brie",
            "Elixir of the Mongoose",
            "Sulfuras, Hand of Ragnaros",
            "Backstage passes to a TAFKAL80ETC concert"
        )
        val sellIn = Range.get(-5, 15)
        val quality = Range.get(0, 50)

        CombinationApprovals.verifyAllCombinations(
            this::updateQuality,
            names,
            sellIn,
            quality
        )

    }

    private fun updateQuality(name: String, sellIn: Int, quality: Int ) : String {
        val items = arrayOf(Item(name, sellIn, quality))
        val app = GildedRose(items)
        app.updateQuality()
        return items[0].toString()
    }

}