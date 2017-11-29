<?php

/**
 * Create a new array by value $mappedTo with array items associated
 *
 * @param array $array
 * @param $mappedTo
 * @return array
 */
function mapByValueToArrayItem(array $array, $mappedTo)
{
	$mappedArray = [];
	foreach ($array as $item) {
		if (array_key_exists($item[$mappedTo], $mappedArray)) {
			$mappedArray[$item[$mappedTo]][] = $item;
		} else {
			$mappedArray[$item[$mappedTo]] = [$item];
		}
	}

	return $mappedArray;
}

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

	return trans('rota.day_of_week.' . $dayOfWeek);
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