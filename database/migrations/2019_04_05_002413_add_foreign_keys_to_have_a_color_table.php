<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHaveAColorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('have_a_color', function(Blueprint $table)
		{
			$table->foreign('ColorId', 'have_a_color_colors_ColorId_fk')->references('ColorId')->on('colors')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('ProductId', 'have_a_color_products_ProductId_fk')->references('ProductId')->on('products')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('have_a_color', function(Blueprint $table)
		{
			$table->dropForeign('have_a_color_colors_ColorId_fk');
			$table->dropForeign('have_a_color_products_ProductId_fk');
		});
	}

}
