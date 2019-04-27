<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHaveATagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('have_a_tag', function(Blueprint $table)
		{
			$table->foreign('ProductId', 'have_a_tag_products_ProductId_fk')->references('ProductId')->on('products')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('TagId', 'have_a_tag_tags_TagId_fk')->references('TagId')->on('tags')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('have_a_tag', function(Blueprint $table)
		{
			$table->dropForeign('have_a_tag_products_ProductId_fk');
			$table->dropForeign('have_a_tag_tags_TagId_fk');
		});
	}

}
