<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->integer('ProductId', true);
			$table->string('ProductName', 200)->nullable();
			$table->text('ShortDesc', 16777215)->nullable();
			$table->text('Description')->nullable();
			$table->integer('SellsNumber')->nullable();
			$table->integer('Qte')->nullable();
			$table->integer('Prix')->nullable();
			$table->integer('PrixLot')->nullable();
			$table->integer('Lot')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
