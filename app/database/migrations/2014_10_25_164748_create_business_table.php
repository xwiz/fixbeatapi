<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('businesses', function(Blueprint $table) {
            $table->increments('id');
            $table->string('business_name', 150);
            $table->string('business_address', 255);
            $table->string('business_email', 32);
            $table->string('business_phone', 13);
            $table->text('business_bio');
            $table->string('business_logo', 255);
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
		Schema::drop('businesses');
	}

}
