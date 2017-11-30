<?php

namespace Tests\Feature;

use App\RotaSlotStaff;
use Tests\TestCase;

class CalculatorTest extends TestCase
{
	/** @test */
	public function application_works()
	{
		$this->get('/')->assertSuccessful();
	}

	/** @test */
	public function a_week_has_seven_days()
	{
		$days = RotaSlotStaff::valid()->get()->groupBy(function ($column) {
			return intToDayOfWeek($column->daynumber);
		});

		$this->assertCount(7, $days->toArray());
	}

	/** @test */
	public function int_to_day_of_the_weeks()
	{
		$monday = intToDayOfWeek(0);
		$this->assertEquals('Monday', $monday);

		$tuesday = intToDayOfWeek(1);
		$this->assertEquals('Tuesday', $tuesday);

		$wednesday = intToDayOfWeek(2);
		$this->assertEquals('Wednesday', $wednesday);

		$thursday = intToDayOfWeek(3);
		$this->assertEquals('Thursday', $thursday);

		$friday = intToDayOfWeek(4);
		$this->assertEquals('Friday', $friday);

		$saturday = intToDayOfWeek(5);
		$this->assertEquals('Saturday', $saturday);

		$sunday = intToDayOfWeek(6);
		$this->assertEquals('Sunday', $sunday);
	}
}
