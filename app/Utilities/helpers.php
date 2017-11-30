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
			$dayOfWeek = 'monday';
			break;
		case 1:
			$dayOfWeek = 'tuesday';
			break;
		case 2:
			$dayOfWeek = 'wednesday';
			break;
		case 3:
			$dayOfWeek = 'thursday';
			break;
		case 4:
			$dayOfWeek = 'friday';
			break;
		case 5:
			$dayOfWeek = 'saturday';
			break;
		case 6:
			$dayOfWeek = 'sunday';
			break;
		default:
			throw new RuntimeException('Number ' . $number . ' is not associated with a day of week');
	}

	return title_case($dayOfWeek);
}