<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCatégoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('catégories', function(Blueprint $table)
		{
			$table->integer('CategorieId', true);
			$table->string('CategorieName', 20)->nullable();
			$table->text('CategorieAvatar', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('catégories');
	}

}
