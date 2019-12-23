<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comment',function($table){
			$table->unsignedInteger('tID');
			$table->text('content');
			$table->string('usrID');
			$table->dateTime('tCreateAt');

			$table->foreign('tID')->references('id')->on('topics');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comment');
	}

}
