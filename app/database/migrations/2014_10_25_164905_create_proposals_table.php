<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProposalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	   Schema::create('proposals', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('business_id');
            $table->integer('user_id');
            $table->string('proposal');
            $table->char('accepted', 2);//Y or N
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
		Schema::drop('proposals');
	}

}
