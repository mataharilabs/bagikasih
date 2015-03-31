<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialActionEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('social_action_events', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('social_action_id');
			$table->integer('event_id');
			$table->integer('user_id');
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
		Schema::drop('social_action_events');
	}

}
