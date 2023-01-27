package gildedrose

class GildedRose(var items: Array<Item>) {

    fun updateQuality() {
        for (i in items.indices) {
            val isNotSulfuras = items[i].name != "Sulfuras, Hand of Ragnaros"
            val isNotAgedBrie = items[i].name != "Aged Brie"
            val isNotBackStage = items[i].name != "Backstage passes to a TAFKAL80ETC concert"

            if (isNotAgedBrie && isNotBackStage) {
                if (items[i].quality > 0) {
                    if (isNotSulfuras) {
                        items[i].quality = items[i].quality - 1
                    }
                }
            } else {
                if (items[i].quality < 50) {
                    items[i].quality = items[i].quality + 1

                    if (items[i].name == "Backstage passes to a TAFKAL80ETC concert") {
                        if (items[i].sellIn < 11) {
                            if (items[i].quality < 50) {
                                items[i].quality = items[i].quality + 1
                            }
                        }

                        if (items[i].sellIn < 6) {
                            if (items[i].quality < 50) {
                                items[i].quality = items[i].quality + 1
                            }
                        }
                    }
                }
            }

            if (isNotSulfuras) {
                items[i].sellIn = items[i].sellIn - 1
            }

            if (items[i].sellIn < 0) {
                if (isNotAgedBrie) {
                    if (isNotBackStage) {
                        if (items[i].quality > 0) {
                            if (isNotSulfuras) {
                                items[i].quality = items[i].quality - 1
                            }
                        }
                    } else {
                        items[i].quality = items[i].quality - items[i].quality
                    }
                } else {
                    if (items[i].quality < 50) {
                        items[i].quality = items[i].quality + 1
                    }
                }
            }
        }
    }

}
