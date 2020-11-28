<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\GildedRose;
use App\Item;

class GildedRoseTest extends TestCase
{

	public function test_Some_Item_Decrease_Quality_in_1_unit()
	{
		$someItem = new Item("Some Item", 2, 3);

		GildedRose::updateQuality([$someItem]);

		$this->assertEquals(2, $someItem->quality);
	}

	public function test_when_date_is_over_the_quality_decrease_double_velocity()
	{
		//given escenario
		$someItem = new Item("Some Item", 0, 4);

		//action
		GildedRose::updateQuality([$someItem]);

		//result
		$this->assertEquals(2, $someItem->quality);
	} 

	public function test_the_quality_never_is_negative()
	{
		//given escenario
		$someItem = new Item("Some Item", 0, 1);

		//action
		GildedRose::updateQuality([$someItem]);

		//result
		$this->assertEquals(0, $someItem->quality);
	} 

	public function test_aged_brie_increase_quality_when_time_over()
	{
		//given escenario
		$someItem = new Item("Aged Brie", 2, 1);

		//action
		GildedRose::updateQuality([$someItem]);

		//result
		$this->assertEquals(2, $someItem->quality);
	}

	public function test_quality_never_is_more_than_50()
	{
		//given escenario
		$someItem = new Item("Aged Brie", 2, 50);

		//action
		GildedRose::updateQuality([$someItem]);

		//result
		$this->assertEquals(50, $someItem->quality);
	}

	public function test_sulfuras_never_have_to_be_sold_and_never_decrease_quality()
	{
		//given escenario
		$sulfuras = new Item("Sulfuras, Hand of Ragnaros", 0, 80);

		//action
		GildedRose::updateQuality([$sulfuras]);

		//result
		$this->assertEquals(80, $sulfuras->quality); //sergi perdonanos, google nos deja hacerlo
		$this->assertEquals(0, $sulfuras->sellIn);
	}

	public function test_backstage_increase_double_quality_when_proximity_is_10_days_closer()
	{
		//given escenario
		$backstage = new Item("Backstage passes to a TAFKAL80ETC concert", 9, 4);

		//action
		GildedRose::updateQuality([$backstage]);

		//result
		$this->assertEquals(6, $backstage->quality);
	}

	public function test_backstage_increase_triple_quality_when_proximity_is_5_days_closer()
	{
		//given escenario
		$backstage = new Item("Backstage passes to a TAFKAL80ETC concert", 5, 1);

		//action
		GildedRose::updateQuality([$backstage]);

		//result
		$this->assertEquals(4, $backstage->quality);
	}

	public function test_backstage_quality_is_zero_after_concert()
	{
		//given escenario
		$backstage = new Item("Backstage passes to a TAFKAL80ETC concert", 0, 2);

		//action
		GildedRose::updateQuality([$backstage]);

		//result
		$this->assertEquals(0, $backstage->quality);
	}

	public function test_conjured_always_decrease_DOUBLE_quality()
	{
		//given escenario
		$conjured = new Item("Conjured", 2, 5);

		//action
		GildedRose::updateQuality([$conjured]);

		//result
		$this->assertEquals(5, $conjured->quality);
	}
}

