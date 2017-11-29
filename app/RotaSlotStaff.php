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
}
