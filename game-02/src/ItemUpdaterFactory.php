<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\ItemUpdaters\AgedBrieUpdater;
use GildedRose\ItemUpdaters\BackstagePassUpdater;
use GildedRose\ItemUpdaters\ConjuredItemUpdater;
use GildedRose\ItemUpdaters\ItemUpdater;
use GildedRose\ItemUpdaters\NormalItemUpdater;
use GildedRose\ItemUpdaters\SulfurasUpdater;

class ItemUpdaterFactory
{
    public static function create(string $itemName): ItemUpdater
    {
        return match ($itemName) {
            'Aged Brie' => new AgedBrieUpdater(),
            'Backstage passes to a TAFKAL80ETC concert' => new BackstagePassUpdater(),
            'Sulfuras, Hand of Ragnaros' => new SulfurasUpdater(),
            'Conjured Mana Cake' => new ConjuredItemUpdater(),
            default => new NormalItemUpdater(),
        };
    }
}
