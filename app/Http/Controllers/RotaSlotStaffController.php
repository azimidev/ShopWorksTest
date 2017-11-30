<?php

namespace App\Http\Controllers;

use App\Calculate;
use App\RotaSlotStaff;

class RotaSlotStaffController extends Controller
{
	public function index(Calculate $calculate)
	{
		$days = RotaSlotStaff::whereNotNull('staffid')
		                     ->where('slottype', 'shift')
		                     ->get()
		                     ->groupBy(function ($column) {
			                     return intToDayOfWeek($column->daynumber);
		                     });

		$total = $calculate->totalHoursByDay($days);
		$alone = $calculate->allweeksAloneTime();

		return view('welcome', compact('days', 'total', 'alone'));
	}
}