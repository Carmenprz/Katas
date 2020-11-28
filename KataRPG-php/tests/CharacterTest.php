<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Character;



class CharacterTest extends TestCase
{

	public function test_Health_starting_at_1000()
	{

		$sonGoku = new Character();

		$result = $sonGoku->getHealth();

		$this->assertEquals(1000, $result);
	}

	public function test_Level_starting_at_1()
	{

		$sonGoku = new Character();

		$result = $sonGoku->getLevel();

		$this->assertEquals(1, $result);
	}

	public function test_starting_Alive()
	{

		$sonGoku = new Character();

		$result = $sonGoku->isAlive();

		$this->assertEquals(true, $result);
	}

	public function test_damage_is_substracted_from_health()
	{
		//given escenario
		$attacker = new Character();
		$damaged = new Character();

		// action
		$attacker->attacks(100, $damaged);

		//then
		$result = $damaged->getHealth();

		$this->assertEquals(900, $result);
	}

	public function test_when_character_dies()
	{
		//given escenario
		$attacker = new Character();
		$damaged = new Character();

		// action
		$attacker->attacks(1000, $damaged);

		//then
		$result = $damaged->isAlive();

		$this->assertEquals(false, $result);
	}

	public function test_when_character_health_a_character()
	{
		//given escenario
		$sanador = new Character();
		$curado = new Character();

		// action
		$sanador->attacks(600, $curado);
		$sanador->curar(200, $curado);

		//then
		$result = $curado->getHealth();

		$this->assertEquals(600, $result);
	}

	public function test_health_cannot_raise_above_1000()
	{
		//given escenario
		$sanador = new Character();
		$curado = new Character();

		// action
		$sanador->curar(1200, $curado);

		//then
		$result = $curado->getHealth();

		$this->assertEquals(1000, $result);
	}

	##ITERATION 2

	public function test_Character_cannot_Deal_Damage_to_itself()
	{
		//given escenario
		$fighter = new Character();

		// action
		$fighter->attacks(200, $fighter);

		//then
		$result = $fighter->getHealth();

		$this->assertEquals(1000, $result);
	}

	public function test_Character_can_only_Heal_itselff()
	{
		//given escenario
		$healer = new Character();
		$fighter = new Character();

		// action
		$fighter->attacks(200, $healer);
		$healer->curar(200, $healer);

		//then
		$result = $healer->getHealth();

		$this->assertEquals(1000, $result);
	}

	// public function test_if_level_is_5_or_more_Damage_is_reduced_by_50() //SIN HACER
	// {
	// 	//given escenario
	// 	$healer = new Character();
	// 	$fighter = new Character();

	// 	// action
	// 	$fighter->attacks(200, $healer);
	// 	$healer->curar(200, $healer);

	// 	//then
	// 	$result = $healer->getHealth();

	// 	$this->assertEquals(1000, $result);
	// }

}
