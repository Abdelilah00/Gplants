<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsseedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('productsseed', function(Blueprint $table)
		{
			$table->integer('ProductSeedId', true);
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
		Schema::drop('productsseed');
	}

}
