<?php

namespace App;

class Calculate
{
	/**
	 * Get the total hours for everyday
	 *
	 * @param $days
	 * @return array
	 */
	public function totalHoursByDay($days)
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

	/**
	 * Gets the alone shifts.
	 *
	 * @param $weekday_shifts
	 * @return float
	 */
	public function aloneShifts($weekday_shifts)
	{
		$aloneShifts = [];

		foreach ($weekday_shifts as $i => $current_shift) {
			$start = $this->seconds($current_shift->starttime);
			$end   = $this->seconds($current_shift->endtime);

			// If end comes before start then it means it's some time on the next day, so add 24h to it (86400 seconds)
			if ($end < $start) {
				$end += 86400;
			}

			// For each shift, compare it with subsequent shifts
			// The comparison is madethis way because we want to avoid repeat result
			// (comparing 1st shift with 2nd shift is the same thing as compare 2nd shift with 1st shift)
			for ($j = $i + 1, $jMax = count($weekday_shifts); $j < $jMax; $j++) {
				$other_shift = $weekday_shifts[$j];
				$other_start = $this->seconds($other_shift->starttime);
				$other_end   = $this->seconds($other_shift->endtime);

				if ($other_end < $other_start) {
					$other_end += 86400;
				}
				// Now send both ranges to another function who's going to return which parts of them are not overlapping
				$tempAloneShifts = $this->notOverlapped($start, $end, $other_start, $other_end, $i, $j);

				// Add those times to original alone shifts array
				$aloneShifts = array_merge($aloneShifts, $tempAloneShifts);
			}
		}

		// This variable will store which indexes will be excluded from final results (because they won't be valid)
		$to_remove = [];

		foreach ($aloneShifts as $i => &$aloneShift) {

			// Create an array with from where these indexes came from
			$indexes = explode(',', $aloneShift['indexes']);

			// Flag to be used on "do while" loop
			$continue = true;
			// Repeat this until continue flag is set to false
			// It means that time it's not valid at all, or it's really a "alone shift" (compared with all other shifts)
			do {
				foreach ($weekday_shifts as $j => $shift) {
					// Do the validation just if this shift doesn't have the same index of one of those indexes inside alone shift variable
					// It avoids camparions with itself
					if ( ! in_array($j, $indexes)) {
						// Get start time in seconds
						$start = $this->seconds($shift->starttime);

						// If both start time and end time (from alone shift) are inside a normal shift range, so it means it's not a valid alone shift
						if ($aloneShift['start'] >= $start) {
							// Mark it as invalid and finish its loop
							$to_remove[] = $i;
							$continue    = false;
						} else {
							// If part of it is overlapping, but another part not then "cut the edges", leave just the valid (alone) part of it
							if (($aloneShift['start'] >= $start && $aloneShift['start'] <= $end) ||
								($aloneShift['end'] >= $start && $aloneShift['end'] <= $end)) {

								// If end time is inside the range, set new end as the start of this normal shift range
								if ($aloneShift['end'] >= $start) {
									$aloneShift['end'] = $start;
								}
							} else {
								$continue = false;
							}
						}
					}
				}
			} while ($continue);
		}

		// After the end of validations, unsetting all those invalid indexes found on previous loop
		foreach ($to_remove as $key => $value) {
			unset($aloneShifts[$value]);
		}

		foreach ($aloneShifts as $i => $iValue) {
			$aloneShifts[$i]['minutes'] = ($aloneShifts[$i]['end'] - $aloneShifts[$i]['start']) / 60;
			foreach ($aloneShifts as $j => $jValue) {
				if ($i != $j) {
					if (array_key_exists($i, $aloneShifts) && array_key_exists($j, $aloneShifts) &&
						$aloneShifts[$i]['start'] == $aloneShifts[$j]['start'] &&
						$aloneShifts[$i]['end'] == $aloneShifts[$j]['end']) {
						unset($aloneShifts[$i]);
					}
				}
			}
		}

		// Return array with shifts where only one person was working
		return $this->sumMinutes($aloneShifts);
	}

	/**
	 * Gets not overlapped.
	 *
	 * @param      integer $start The start
	 * @param      integer $end The end
	 * @param      integer $other_start The other start
	 * @param      integer $other_end The other end
	 * @param      integer $index_1 The index 1
	 * @param      integer $index_2 The index 2
	 * @return     array    $times
	 */
	public function notOverlapped($start, $end, $other_start, $other_end, $index_1, $index_2)
	{
		$times = [];

		if ($start >= $other_start && $start <= $other_end) {
			// Set new start and end, excluding the overlapped part
			// If new start and new end are the same, it means were not really overlapping, they were just adjacent and we shouldn't count them
			if ($other_start != $start) {
				$times[] = ['start' => $other_start, 'end' => $start, 'indexes' => $index_1 . ',' . $index_2];
			}
		}

		return $times;
	}

	/**
	 * Gets the seconds.
	 *
	 * @param      string $time_string The time string
	 * @return     integer  The seconds.
	 */
	public function seconds($time_string)
	{
		// Times coming from database are like '11:11:11'
		// This creates an array where its 1st index contais hours, the 2nd minutes and the 3rd seconds
		$time_exploded = explode(':', $time_string);

		// Calculate seconds from a given time
		// Return time in seconds
		return $time_exploded[0] * 3600 + $time_exploded[1] * 60 + $time_exploded[2];
	}

	/**
	 *  Take shifts and sum how many minutes they have
	 *
	 * @param      array $shifts The shifts
	 * @return     float   $total   Total minutes
	 */
	public function sumMinutes($shifts)
	{
		$total = 0;

		foreach ($shifts as $key => $shift) {
			$total += ($shift['end'] - $shift['start']) / 60;
		}

		return $total;
	}

	/**
	 * @return array
	 */
	public function allweeksAloneTime()
	{
		$week = [];

		$week['monday']    = $this->aloneShifts(RotaSlotStaff::weekdayShifts('0'));
		$week['tuesday']   = $this->aloneShifts(RotaSlotStaff::weekdayShifts('1'));
		$week['wednesday'] = $this->aloneShifts(RotaSlotStaff::weekdayShifts('2'));
		$week['thursday']  = $this->aloneShifts(RotaSlotStaff::weekdayShifts('3'));
		$week['friday']    = $this->aloneShifts(RotaSlotStaff::weekdayShifts('4'));
		$week['saturday']  = $this->aloneShifts(RotaSlotStaff::weekdayShifts('5'));
		$week['sunday']    = $this->aloneShifts(RotaSlotStaff::weekdayShifts('6'));

		return $week;
	}
}