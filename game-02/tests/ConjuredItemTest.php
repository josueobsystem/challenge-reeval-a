<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class ConjuredItemTest extends TestCase
{
    public function testConjuredItemsDegradeTwiceAsFast(): void
    {
        $items = [new Item('Conjured Mana Cake', 10, 20)];
        $app = new GildedRose($items);
        $app->updateQuality();
        $this->assertEquals(18, $items[0]->quality);
    }

    public function testConjuredItemsDegradeTwiceAsFastAfterSellIn(): void
    {
        $items = [new Item('Conjured Mana Cake', 0, 20)];
        $app = new GildedRose($items);
        $app->updateQuality();
        $this->assertEquals(16, $items[0]->quality);
    }

    public function testConjuredItemQualityNeverNegative(): void
    {
        $items = [new Item('Conjured Mana Cake', 10, 1)];
        $app = new GildedRose($items);
        $app->updateQuality();
        $this->assertEquals(0, $items[0]->quality);
    }
}
