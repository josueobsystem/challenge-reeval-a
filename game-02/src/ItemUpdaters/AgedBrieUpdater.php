<?php

declare(strict_types=1);

namespace GildedRose\ItemUpdaters;

use GildedRose\Item;

class AgedBrieUpdater extends ItemUpdater
{
    protected function updateQuality(Item $item): void
    {
        $this->increaseQuality($item);
    }

    protected function handleExpired(Item $item): void
    {
        if ($item->sellIn < 0) {
            $this->increaseQuality($item);
        }
    }
}
