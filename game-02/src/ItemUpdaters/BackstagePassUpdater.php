<?php

declare(strict_types=1);

namespace GildedRose\ItemUpdaters;

use GildedRose\Item;

class BackstagePassUpdater extends ItemUpdater
{
    protected function updateQuality(Item $item): void
    {
        $this->increaseQuality($item);

        if ($item->sellIn < 11) {
            $this->increaseQuality($item);
        }

        if ($item->sellIn < 6) {
            $this->increaseQuality($item);
        }
    }

    protected function handleExpired(Item $item): void
    {
        if ($item->sellIn < 0) {
            $item->quality = 0;
        }
    }
}
