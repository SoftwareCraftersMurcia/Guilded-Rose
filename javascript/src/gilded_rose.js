const MAX_QUALITY = 50;

class Shop {
  constructor(items = []) {
    this.items = items;
  }
  updateQuality() {
    for (let i = 0; i < this.items.length; i++) {
      if (
        !this.isAgedBrie(this.items[i]) &&
        !this.isBackStagePasses(this.items[i])
      ) {
        if (this.items[i].quality > 0) {
          if (!this.isSulfuras(this.items[i])) {
            this.items[i].quality = this.items[i].quality - 1;
          }
        }
      } else {
        if (this.items[i].quality < MAX_QUALITY) {
          this.items[i].quality = this.items[i].quality + 1;
          if (this.isBackStagePasses(this.items[i])) {
            this.updateQualityForBackstagePasses(this.items[i]);
          }
        }
      }
      if (!this.isSulfuras(this.items[i])) {
        this.items[i].sellIn = this.items[i].sellIn - 1;
      }
      if (this.items[i].sellIn < 0) {
        if (this.items[i].name != "Aged Brie") {
          if (!this.isBackStagePasses(this.items[i])) {
            if (this.items[i].quality > 0) {
              if (!this.isSulfuras(this.items[i])) {
                this.items[i].quality = this.items[i].quality - 1;
              }
            }
          } else {
            this.items[i].quality =
              this.items[i].quality - this.items[i].quality;
          }
        } else {
          if (this.items[i].quality < MAX_QUALITY) {
            this.items[i].quality = this.items[i].quality + 1;
          }
        }
      }
    }

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
