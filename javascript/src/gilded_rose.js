const MAX_QUALITY = 50;

class Shop {
  constructor(items = []) {
    this.items = items;
  }
  updateQuality() {
    this.items.forEach((item) => {
      if (!isAgedBrie(item) && !isBackStagePasses(item)) {
        if (qualityIsMoreThanZero(item)) {
          if (!isSulfuras(item)) {
            item.quality = item.quality - 1;
          }
        }
      } else {
        if (qualityIsLessThanMax(item)) {
          item.quality = item.quality + 1;
          if (isBackStagePasses(item)) {
            updateQualityForBackstagePasses(item);
          }
        }
      }
      if (!isSulfuras(item)) {
        item.sellIn = item.sellIn - 1;
      }
      if (item.sellIn < 0) {
        if (!isAgedBrie(item)) {
          if (!isBackStagePasses(item)) {
            if (qualityIsMoreThanZero(item)) {
              if (!isSulfuras(item)) {
                item.quality = item.quality - 1;
              }
            }
          } else {
            item.quality = item.quality - item.quality;
          }
        } else {
          if (qualityIsLessThanMax(item)) {
            item.quality = item.quality + 1;
          }
        }
      }
    });

    return this.items;
  }
}

const isAgedBrie = (item) => {
  return item.name == "Aged Brie";
};

const isBackStagePasses = (item) => {
  return item.name == "Backstage passes to a TAFKAL80ETC concert";
};

const isSulfuras = (item) => {
  return item.name == "Sulfuras, Hand of Ragnaros";
};

const updateQualityForBackstagePasses = (item) => {
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
};

const qualityIsMoreThanZero = (item) => {
  return item.quality > 0;
};

module.exports = { Shop };
function qualityIsLessThanMax(item) {
  return item.quality < MAX_QUALITY;
}
