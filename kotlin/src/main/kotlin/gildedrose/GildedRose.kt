package gildedrose

class GildedRose(var items: Array<Item>) {

    fun updateQuality() {
        for (i in items.indices) {
            val isSulfuras = items[i].name == "Sulfuras, Hand of Ragnaros"
            val isAgedBrie = items[i].name == "Aged Brie"
            val isBackStage = items[i].name == "Backstage passes to a TAFKAL80ETC concert"

            if (!isAgedBrie && !isBackStage) {
                if (items[i].quality > 0) {
                    if (!isSulfuras) {
                        items[i].quality = items[i].quality - 1
                    }
                }
            } else {
                if (items[i].quality < 50) {
                    items[i].quality = items[i].quality + 1

                    if (isBackStage) {
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

            if (!isSulfuras) {
                items[i].sellIn = items[i].sellIn - 1
            }

            if (items[i].sellIn < 0) {
                if (!isAgedBrie) {
                    if (!isBackStage) {
                        if (items[i].quality > 0) {
                            if (!isSulfuras) {
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
