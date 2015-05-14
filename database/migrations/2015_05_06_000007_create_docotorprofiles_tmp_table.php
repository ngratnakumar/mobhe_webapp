<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorProfilesTmpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mobhe_DoctorProfiles_tmp', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('city');
			$table->string('expertise');
			$table->string('gp_status');
			$table->string('objectId');
			$table->string('fee');
			$table->string('consultationFee');
			$table->string('keywords');
			$table->string('installationId');
			$table->string('isAssigned');
			$table->string('isOnline');
			$table->string('password');
			$table->string('username');
			$table->string('mobile');
			$table->string('time_from');
			$table->string('time_to');
			$table->string('qualification');
			$table->string('name');
			$table->string('practiceAddressLine1');
			$table->string('practiceAddressLine2');
			$table->string('practiceAddressLine3');
			$table->string('practice_add1');
			$table->string('address');
			$table->string('email');
			$table->string('experience');
			$table->string('status');
			$table->string('problems');
			$table->string('callbackStatus');
			$table->string('kmc');
			$table->string('mobilenumber');
			$table->string('area');
			$table->string('yearofqualification');
			$table->string('qualification2');
			$table->string('qualification3');
			$table->string('qualification4');
			$table->string('ac_holder_name');
			$table->string('ac_bank_name');
			$table->string('ac_branch');
			$table->string('ac_number');
			$table->string('ac_branch_ifsc');
			$table->string('bio');
			$table->string('time_from2');
			$table->string('time_to2');
			$table->string('state');
			$table->string('hospital_name');
			$table->string('limit_requests');
			$table->string('physician_id');
			$table->string('specialist_surgeon');
			$table->string('additionalInfo');
			$table->string('installationObjectId');
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
		Schema::drop('mobhe_DoctorProfiles_tmp');
	}

}
