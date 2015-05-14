<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabQuotes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mobhe_lab_quotes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('lab_id');
			$table->integer('test_id');
			$table->string('lab_cost');
			$table->string('homevisit_cost');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations. Quotes 
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mobhe_lab_quotes');
	}

}
