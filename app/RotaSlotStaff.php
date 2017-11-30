<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RotaSlotStaff extends Model
{
	protected $table    = 'rota_slot_staff';
	protected $fillable = [
		'rotaid',
		'daynumber',
		'staffid',
		'slottype',
		'starttime',
		'endtime',
		'workhours',
		'premiumminutes',
		'roletypeid',
		'freeminutes',
		'seniorcashierminutes',
		'splitshifttimes',
	];

	public function scopeValid($query)
	{
		return $query->whereNotNull('staffid')->where('slottype', 'shift');
	}

	public function scopeShift($query)
	{
		return $query->select('starttime', 'endtime');
	}

	public static function weekdayShifts($weekday)
	{
		$query = self::valid()->shift();

		switch ($weekday) {
			case '0':
				$query->monday();
				break;
			case '1':
				$query->tuesday();
				break;
			case '2':
				$query->wednesday();
				break;
			case '3':
				$query->thursday();
				break;
			case '4':
				$query->friday();
				break;
			case '5':
				$query->saturday();
				break;
			case '6':
				$query->sunday();
				break;
		}

		return $query->get();
	}

	public function scopeMonday($query)
	{
		return $query->where('daynumber', 0);
	}

	public function scopeTuesday($query)
	{
		return $query->where('daynumber', 1);
	}

	public function scopeWednesday($query)
	{
		return $query->where('daynumber', 2);
	}

	public function scopeThursday($query)
	{
		return $query->where('daynumber', 3);
	}

	public function scopeFriday($query)
	{
		return $query->where('daynumber', 4);
	}

	public function scopeSaturday($query)
	{
		return $query->where('daynumber', 5);
	}

	public function scopeSunday($query)
	{
		return $query->where('daynumber', 6);
	}
}
