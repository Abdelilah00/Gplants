<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToInCatégorieTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('in_catégorie', function(Blueprint $table)
		{
			$table->foreign('CatégorieId', 'table_name_catégories_CategorieId_fk')->references('CategorieId')->on('catégories')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('ProductId', 'table_name_products_ProductId_fk')->references('ProductId')->on('products')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('in_catégorie', function(Blueprint $table)
		{
			$table->dropForeign('table_name_catégories_CategorieId_fk');
			$table->dropForeign('table_name_products_ProductId_fk');
		});
	}

}
