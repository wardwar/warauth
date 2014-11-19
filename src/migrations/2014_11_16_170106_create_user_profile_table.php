<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_profiles', function( Blueprint $table)
		{
			$table->integer('id');
			$table->string('name')->nullable();
			$table->string('address')->nullable();
			$table->string('city')->nullable();
			$table->string('photo')->nullable();
			$table->integer('black_rate')->default(0);
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
		Schema::drop('user_profiles');
	}

}
