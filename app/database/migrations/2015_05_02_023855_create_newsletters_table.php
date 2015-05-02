<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewslettersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('newsletters', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->nullable();
			$table->integer('type')->default(3)->comment('0: invoice, 1: is_my_social_target_subscriber, 2: is_my_social_action_subscriber, 3: is_newsletter_subscriber');
			$table->string('sender_email', 40);
			$table->string('sender_name', 40);
			$table->string('recipient_email', 40);
			$table->string('recipient_name', 40);
			$table->string('subject', 255);
			$table->text('message');
			$table->integer('status')->default(0)->comment('0: new, 1: is sent, 2: is failed');
			$table->string('nid', 25)->nullable()->comment('unique key');
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
		Schema::drop('newsletters');
	}

}
