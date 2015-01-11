<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('photos', function(Blueprint $table){
            $table->increments('id');
            $table->integer('location_id')->unsigned();
            $table->string('alt');
            $table->string('url');
            $table->timestamps();
        });

        Schema::table('photos', function($table){
            $table->foreign('location_id')
                ->references('id')->on('locations');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('photos');
	}

}
