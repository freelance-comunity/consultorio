<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsulationsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('consulations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name_patients');
			$table->string('name_doctor');
			$table->date('date');
			$table->integer('weight');
			$table->integer('temperature');
			$table->string('treatment');
			$table->integer('patients_id')->unsigned()->foreign('patients_id')->references('id')->on('patients');
			$table->integer('doctors_id')->unsigned()->foreign('doctors_id')->references('id')->on('doctors');
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
		Schema::drop('consulations');
	}

}
