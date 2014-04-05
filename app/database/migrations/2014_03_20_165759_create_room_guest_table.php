<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomGuestTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('room_guest', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer("room_id");
            $table->integer("guest_id");
            $table->date("check_in");
            $table->date("check_out");
            $table->string("agent");
            $table->string("price");
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
		Schema::drop('room_guest');
	}

}
