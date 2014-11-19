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
		Schema::create('user_login',function(Blueprint $table)
		{
			$table->increments('id');
			$table->enum('role',array(9,5,7));
			$table->string('username',60)->unique();
			$table->string('email',50)->unique();
			$table->string('password');
			$table->boolean('confirmed')->default(0);
			$table->string('confirmation_code',30)->nullable();
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
		Schema::drop('user_login');
	}

}
