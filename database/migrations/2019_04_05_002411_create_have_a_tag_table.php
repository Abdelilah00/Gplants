<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHaveATagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('have_a_tag', function(Blueprint $table)
		{
			$table->integer('ProductId')->nullable()->index('have_a_tag_products_ProductId_fk');
			$table->integer('TagId')->nullable()->index('have_a_tag_tags_TagId_fk');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('have_a_tag');
	}

}
