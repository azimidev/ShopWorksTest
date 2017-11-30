<?php

namespace Tests\Feature;

use App\Calculate;
use App\RotaSlotStaff;
use Tests\TestCase;

class CalculatorTest extends TestCase
{
	protected $calculate;
	protected $days;

	public function setUp()
	{
		parent::setUp();
		$this->calculate = new Calculate();
		$this->days      = RotaSlotStaff::valid()->get()->groupBy(function ($column) {
			return intToDayOfWeek($column->daynumber);
		});
	}

	/** @test */
	public function application_works()
	{
		$this->get('/')->assertSuccessful();
	}

	/** @test */
	public function a_week_has_seven_days()
	{
		$this->assertCount(7, $this->days->toArray());
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

	/** @test */
	public function total_hours_for_monday()
	{
		$monday = $this->calculate->totalHoursByDay($this->days);

		$this->assertEquals(37.92, $monday['Monday']['hours']);
	}

	/** @test */
	public function total_hours_for_tuesday()
	{
		$tuesday = $this->calculate->totalHoursByDay($this->days);

		$this->assertEquals(31, $tuesday['Tuesday']['hours']);
	}

	/** @test */
	public function total_hours_for_wednesday()
	{
		$tuesday = $this->calculate->totalHoursByDay($this->days);

		$this->assertEquals(46, $tuesday['Wednesday']['hours']);
	}

	/** @test */
	public function total_hours_for_thursday()
	{
		$tuesday = $this->calculate->totalHoursByDay($this->days);

		$this->assertEquals(41, $tuesday['Thursday']['hours']);
	}

	/** @test */
	public function total_hours_for_friday()
	{
		$tuesday = $this->calculate->totalHoursByDay($this->days);

		$this->assertEquals(54, $tuesday['Friday']['hours']);
	}

	/** @test */
	public function total_hours_for_saturday()
	{
		$tuesday = $this->calculate->totalHoursByDay($this->days);

		$this->assertEquals(57, $tuesday['Saturday']['hours']);
	}

	/** @test */
	public function total_hours_for_sunday()
	{
		$tuesday = $this->calculate->totalHoursByDay($this->days);

		$this->assertEquals(33.5, $tuesday['Sunday']['hours']);
	}
}
