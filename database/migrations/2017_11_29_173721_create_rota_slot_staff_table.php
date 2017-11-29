<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRotaSlotStaffTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rota_slot_staff', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('rotaid');
			$table->unsignedSmallInteger('daynumber');
			$table->unsignedInteger('staffid')->nullable();
			$table->string('slottype', 20);
			$table->time('starttime')->nullable();
			$table->time('endtime')->nullable();
			$table->float('workhours', 4);
			$table->smallInteger('premiumminutes')->nullable();
			$table->unsignedInteger('roletypeid')->nullable();
			$table->unsignedInteger('freeminutes')->nullable();
			$table->unsignedSmallInteger('seniorcashierminutes')->nullable();
			$table->string('splitshifttimes', 11)->nullable();
			$table->timestamps();

			$table->index(['rotaid', 'staffid'], 'rotaid');
			$table->index('daynumber', 'daynumber');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('rota_slot_staff');
	}
}
