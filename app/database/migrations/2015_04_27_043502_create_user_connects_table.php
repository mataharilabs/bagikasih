<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserConnectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_connects', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->string('twitter_oauth_token', 100)->nullable();
			$table->string('twitter_oauth_verifier', 100)->nullable();
			$table->string('facebook_user_id', 40)->nullable();
			$table->string('facebook_oauth_token', 100)->nullable();
			$table->integer('status')->default(1);
			$table->integer('created_at');
			$table->integer('updated_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_connects');
	}

}
