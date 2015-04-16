<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->string('currency', 3)->default('IDR');
			$table->double('total', 20, 2)->default(0);
			$table->integer('transferred_at');
			$table->string('to_bank', 100);
			$table->string('bank_name', 40);
			$table->string('bank_account', 25);
			$table->string('bank_account_name', 40);
			$table->text('message')->nullable();
			$table->integer('status')->default(0);
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
		Schema::drop('payments');
	}

}
