<?php

namespace App\Http\Controllers;

use App\RotaSlotStaff;

class RotaSlotStaffController extends Controller
{
	public function index()
	{
		$days = RotaSlotStaff::whereNotNull('staffid')
		                     ->where('slottype', 'shift')
		                     ->get()
		                     ->groupBy(function ($column) {
			                     return intToDayOfWeek($column->daynumber);
		                     });

		$total = $this->countTotalHoursByDay($days);

		return view('welcome', compact('days', 'total'));
	}

	private function countTotalHoursByDay($days)
	{
		$hoursByDay = [];
		foreach ($days as $day => $staff) {
			$totalHoursWorked = 0;
			foreach ($staff as $item) {
				$totalHoursWorked += $item['workhours'];
			}

			$hoursByDay[$day]['hours'] = $totalHoursWorked;
		}

		return $hoursByDay;
	}
}