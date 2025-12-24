<?php

declare(strict_types=1);

namespace GildedRose\ItemUpdaters;

use GildedRose\Item;

abstract class ItemUpdater
{
    public function update(Item $item): void
    {
        $this->updateQuality($item);
        $this->updateSellIn($item);
        $this->handleExpired($item);
    }

    protected function updateQuality(Item $item): void
    {
        $this->decreaseQuality($item);
    }

    protected function updateSellIn(Item $item): void
    {
        $item->sellIn--;
    }

    protected function handleExpired(Item $item): void
    {
        if ($item->sellIn < 0) {
            $this->decreaseQuality($item);
        }
    }

    protected function increaseQuality(Item $item): void
    {
        if ($item->quality < 50) {
            $item->quality++;
        }
    }

    protected function decreaseQuality(Item $item): void
    {
        if ($item->quality > 0) {
            $item->quality--;
        }
    }
}
