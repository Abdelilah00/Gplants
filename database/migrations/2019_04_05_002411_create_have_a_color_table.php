<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHaveAColorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('have_a_color', function(Blueprint $table)
		{
			$table->integer('ColorId')->nullable()->index('have_a_color_colors_ColorId_fk');
			$table->integer('ProductId')->nullable()->index('have_a_color_products_ProductId_fk');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('have_a_color');
	}

}
