<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mobhe_Requests', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('objectId');
			$table->string('Images');
			$table->string('Notes');
			$table->string('date');
			$table->string('time');
			$table->string('doctorId');
			$table->string('patientBloodGroup');
			$table->string('Type');
			$table->string('doctorName');
			$table->string('patientAllergies');
			$table->string('patientObjectId');
			$table->string('OTCData');
			$table->string('Prescription');
			$table->string('Schedule');
			$table->string('status');
			$table->string('userId');
			$table->string('LabTestNames');
			$table->string('LabTestPrescription');
			$table->string('verifyStatus');
			$table->string('medicationReminder');
			$table->string('patientDisease');
			$table->string('patientMedications');
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
		Schema::drop('mobhe_Requests');
	}

}
