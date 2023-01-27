const MAX_QUALITY = 50;

class Shop {
  constructor(items = []) {
    this.items = items;
  }
  updateQuality() {
    this.items.forEach((item) => {
      if (!this.isAgedBrie(item) && !this.isBackStagePasses(item)) {
        if (item.quality > 0) {
          if (!this.isSulfuras(item)) {
            item.quality = item.quality - 1;
          }
        }
      } else {
        if (item.quality < MAX_QUALITY) {
          item.quality = item.quality + 1;
          if (this.isBackStagePasses(item)) {
            this.updateQualityForBackstagePasses(item);
          }
        }
      }
      if (!this.isSulfuras(item)) {
        item.sellIn = item.sellIn - 1;
      }
      if (item.sellIn < 0) {
        if (item.name != "Aged Brie") {
          if (!this.isBackStagePasses(item)) {
            if (item.quality > 0) {
              if (!this.isSulfuras(item)) {
                item.quality = item.quality - 1;
              }
            }
          } else {
            item.quality = item.quality - item.quality;
          }
        } else {
          if (item.quality < MAX_QUALITY) {
            item.quality = item.quality + 1;
          }
        }
      }
    });

    return this.items;
  }

  isSulfuras(item) {
    return item.name == "Sulfuras, Hand of Ragnaros";
  }

  isBackStagePasses(item) {
    return item.name == "Backstage passes to a TAFKAL80ETC concert";
  }

  isAgedBrie(item) {
    return item.name == "Aged Brie";
  }

  updateQualityForBackstagePasses(item) {
    if (item.sellIn < 11) {
      if (item.quality < 50) {
        item.quality = item.quality + 1;
      }
    }
    if (item.sellIn < 6) {
      if (item.quality < 50) {
        item.quality = item.quality + 1;
      }
    }
  }
}

module.exports = { Shop };
