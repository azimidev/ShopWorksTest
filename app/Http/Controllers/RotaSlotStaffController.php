<?php
//
// namespace App\Http\Controllers;
//
// use Illuminate\Http\Request;
//
// class RotaSlotStaffController extends Controller
// {
// 	/**
// 	 * Display Rota slot staff table where staffId is not null and slot type is shift
// 	 *
// 	 * @param RotaSlotStaffRepository $rotaSlotStaff
// 	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
// 	 */
// 	public function index(RotaSlotStaffRepository $rotaSlotStaff)
// 	{
// 		$staff = $this->getStaffOfTypeShift($rotaSlotStaff);
//
// 		$dayByStaff = mapByValueToArrayItem($staff, 'daynumber');
// 		$hoursByDay = $this->countTotalHoursByDay($dayByStaff);
//
// 		return view('index', compact('dayByStaff', 'hoursByDay'));
// 	}
//
// 	/**
// 	 * Get staff data by day
// 	 *
// 	 * @param RotaSlotStaffRepository $rotaSlotStaff
// 	 * @return array
// 	 */
// 	public function getStaffDataByDay(RotaSlotStaffRepository $rotaSlotStaff)
// 	{
// 		$staff = $this->getStaffOfTypeShift($rotaSlotStaff);
// 		$staffByDay = mapByValueToArrayItem($staff, 'staffid');
//
// 		ksort($staffByDay);
//
// 		return $staffByDay;
// 	}
//
// 	/**
// 	 * Get all staff that staff type is shift and staff id is not null
// 	 *
// 	 * @param RotaSlotStaffRepository $rotaSlotStaff
// 	 * @return mixed
// 	 */
// 	private function getStaffOfTypeShift(RotaSlotStaffRepository $rotaSlotStaff)
// 	{
// 		return $rotaSlotStaff->all(['staffid', 'daynumber', 'starttime', 'endtime', 'workhours', 'slottype'])->filter(function ($staffMember) {
// 			return !is_null($staffMember->staffid) && $staffMember->slottype == 'shift';
// 		})->toArray();
// 	}
//
// 	/**
// 	 * Add total work hours by day to existing array
// 	 *
// 	 * @param $staffByDay
// 	 * @return array
// 	 */
// 	private function countTotalHoursByDay($staffByDay)
// 	{
// 		$hoursByDay = [];
// 		foreach ($staffByDay as $day => $staff) {
// 			$totalHoursWorked = 0;
// 			foreach ($staff as $item) {
// 				$totalHoursWorked += $item['workhours'];
// 			}
//
// 			$hoursByDay[$day]['totalHoursWorked'] = $totalHoursWorked;
// 		}
//
// 		return $hoursByDay;
// 	}
// }
