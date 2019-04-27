<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCommandsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('commands', function(Blueprint $table)
		{
			$table->foreign('UserId', 'commands_users_UserId_fk')->references('UserId')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('commands', function(Blueprint $table)
		{
			$table->dropForeign('commands_users_UserId_fk');
		});
	}

}
