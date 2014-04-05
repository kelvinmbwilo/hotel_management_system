<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('guest', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string("first_name");
            $table->string("middle_name");
            $table->string("last_name");
            $table->string("email");
            $table->string("phone_number");
            $table->string("country");
            $table->string("status");
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
		Schema::drop('guest');
	}

}
