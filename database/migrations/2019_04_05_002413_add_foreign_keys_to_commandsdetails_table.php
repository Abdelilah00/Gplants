<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCommandsdetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('commandsdetails', function(Blueprint $table)
		{
			$table->foreign('CommandId', 'CommandsDetails_commands_CommandId_fk')->references('CommandId')->on('commands')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('ProductId', 'CommandsDetails_products_ProductId_fk')->references('ProductId')->on('products')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('commandsdetails', function(Blueprint $table)
		{
			$table->dropForeign('CommandsDetails_commands_CommandId_fk');
			$table->dropForeign('CommandsDetails_products_ProductId_fk');
		});
	}

}
