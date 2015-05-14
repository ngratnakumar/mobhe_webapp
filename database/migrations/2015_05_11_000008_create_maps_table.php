<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mobhe_maps', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('addressLine1');
			$table->string('addressLine2');
			$table->string('addressLine3');
			$table->string('lat',20,10);
			$table->string('lng',20,10);
			$table->string('phone');
			$table->string('openTimings');
			$table->string('facilities');
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
		Schema::drop('mobhe_maps');
	}

}
