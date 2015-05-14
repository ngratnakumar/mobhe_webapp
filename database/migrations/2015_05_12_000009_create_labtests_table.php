<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabTests extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mobhe_labtests', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('test_name');
			$table->string('formal_name');
			$table->string('alias_name');
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
		Schema::drop('mobhe_labtests');
	}

}
