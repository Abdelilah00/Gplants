<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommandsdetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('commandsdetails', function(Blueprint $table)
		{
			$table->integer('CommandDetailsId', true);
			$table->integer('CommandId')->nullable()->index('CommandsDetails_commands_CommandId_fk');
			$table->integer('ProductId')->nullable()->index('CommandsDetails_products_ProductId_fk');
			$table->integer('Qte');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('commandsdetails');
	}

}
