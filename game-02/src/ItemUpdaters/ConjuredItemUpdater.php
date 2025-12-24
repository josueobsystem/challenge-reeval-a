<?php

declare(strict_types=1);

namespace GildedRose\ItemUpdaters;

use GildedRose\Item;

class ConjuredItemUpdater extends ItemUpdater
{
    protected function updateQuality(Item $item): void
    {
        $this->decreaseQuality($item);
        $this->decreaseQuality($item);
    }

    protected function handleExpired(Item $item): void
    {
        if ($item->sellIn < 0) {
            $this->decreaseQuality($item);
            $this->decreaseQuality($item);
        }
    }
}
