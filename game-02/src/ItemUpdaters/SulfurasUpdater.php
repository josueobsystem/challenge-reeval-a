<?php

declare(strict_types=1);

namespace GildedRose\ItemUpdaters;

use GildedRose\Item;

class SulfurasUpdater extends ItemUpdater
{
    public function update(Item $item): void
    {
        // Sulfuras never has to be sold or decreases in Quality
    }
}
