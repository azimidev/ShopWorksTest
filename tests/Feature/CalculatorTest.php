<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CalculatorTest extends TestCase
{
	use RefreshDatabase;

	/** @test */
	public function application_works()
	{
		$this->get('/')
		     ->assertSuccessful();
	}
}
