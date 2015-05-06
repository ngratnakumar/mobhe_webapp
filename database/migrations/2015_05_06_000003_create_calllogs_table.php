<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalllogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mobhe_calllogs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('patienObjectId');
			$table->string('doctorObjectId');
			$table->string('patient_name');
			$table->string('doctor_name');
			$table->string('patient_mobile_num');
			$table->string('doctor_mobile_num');
			$table->string('patient_user_id');
			$table->string('objectId');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mobhe_calllogs');
	}

}
