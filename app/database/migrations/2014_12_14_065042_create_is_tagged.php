<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIsTagged extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('isTagged', function($table)
    	{
	        $table->increments('id');
	        $table->unsignedInteger('tID');
	        $table->unsignedInteger('qID');  

	        $table->foreign('tID')->references('id')->on('topics');      
	        $table->foreign('qID')->references('id')->on('query');
    	});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('isTagged');
	}

}
