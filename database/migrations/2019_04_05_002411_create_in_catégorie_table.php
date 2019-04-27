<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInCatégorieTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('in_catégorie', function(Blueprint $table)
		{
			$table->integer('CatégorieId')->nullable()->index('table_name_catégories_CategorieId_fk');
			$table->integer('ProductId')->nullable()->index('table_name_products_ProductId_fk');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('in_catégorie');
	}

}
