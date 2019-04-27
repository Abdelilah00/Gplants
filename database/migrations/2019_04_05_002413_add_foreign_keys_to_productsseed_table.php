<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToProductsseedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('productsseed', function(Blueprint $table)
		{
			$table->foreign('ProductSeedId', 'productsseed_productsgreen_ProductGreenId_fk')->references('ProductId')->on('products')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('productsseed', function(Blueprint $table)
		{
			$table->dropForeign('productsseed_productsgreen_ProductGreenId_fk');
		});
	}

}
