<?php

/**
 * Transforms an integer to day of week
 *
 * @param $number
 * @return string|\Symfony\Component\Translation\TranslatorInterface
 * @throws Exception
 */
function intToDayOfWeek($number)
{
	$dayOfWeek = null;
	switch ($number) {
		case 0:
			$dayOfWeek = 'sunday';
			break;
		case 1:
			$dayOfWeek = 'monday';
			break;
		case 2:
			$dayOfWeek = 'tuesday';
			break;
		case 3:
			$dayOfWeek = 'wednesday';
			break;
		case 4:
			$dayOfWeek = 'thursday';
			break;
		case 5:
			$dayOfWeek = 'friday';
			break;
		case 6:
			$dayOfWeek = 'saturday';
			break;
		default:
			throw new RuntimeException('Number ' . $number . ' is not associated with a day of week');
	}

	return title_case($dayOfWeek);
}

/**
 * Count how many minutes in a float number representing hours
 *
 * @param $time
 * @return int
 */
function floatHoursToMinutes($time)
{
	return (int) $time * 60 + (int) (fmod($time, 1) * 60);
}