<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLoginTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//USER_LOGIN TABLE
		Schema::create('USER_LOGIN',function(Blueprint $table)
		{
			$table->increments('id_userlogin');
			$table->integer('id_user');
			$table->integer('id_printing');
			$table->string('role');
			$table->string('username')->unique();
			$table->string('email')->unique();
			$table->string('password');
			$table->boolean('confirmed')->default(0);
			$table->string('confirmation_code')->nullable();
			$table->boolean('banned')->default(0);
			$table->string('facebook_token')->unique()->nullable();
			$table->rememberToken();
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
		//DROP TABLE
		Schema::drop('USER_LOGIN');
	}

}
