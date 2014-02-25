<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rooms', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string("name");
            $table->string("image");
            $table->string("bed_size");
            $table->string("bed_type");
            $table->string("number_of_beds");
            $table->string("category");
            $table->string("price");
            $table->string("description");
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
		Schema::drop('rooms');
	}

}
