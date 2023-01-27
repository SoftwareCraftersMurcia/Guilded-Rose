package gildedrose

class GildedRose(var items: Array<Item>) {

    fun updateQuality() {
        for (i in items.indices) {
            val isSulfuras = items[i].name == "Sulfuras, Hand of Ragnaros"
            val isAgedBrie = items[i].name == "Aged Brie"
            val isBackStage = items[i].name == "Backstage passes to a TAFKAL80ETC concert"

            if (!isAgedBrie && !isBackStage) {
                decreaseQuality(isSulfuras, items[i])
            } else {
                if (items[i].quality < 50) {
                    items[i].quality = items[i].quality + 1

                    if (isBackStage) {
                        if (items[i].sellIn < 11) {
                            increaseQuality(items[i])
                        }

                        if (items[i].sellIn < 6) {
                            increaseQuality(items[i])
                        }
                    }
                }
            }

            if (!isSulfuras) {
                items[i].sellIn = items[i].sellIn - 1
            }

            if (items[i].sellIn < 0) {
                if (isAgedBrie) {
                    increaseQuality(items[i])
                } else {
                    if (isBackStage) {
                        items[i].quality = items[i].quality - items[i].quality
                    } else {
                        decreaseQuality(isSulfuras, items[i])
                    }
                }
            }
        }
    }

    private fun decreaseQuality(isSulfuras: Boolean, item: Item) {
        if (item.quality > 0) {
            if (!isSulfuras) {
                item.quality = item.quality - 1
            }
        }
    }

    private fun increaseQuality(item: Item) {
        if (item.quality < 50) {
            item.quality = item.quality + 1
        }
    }

}
