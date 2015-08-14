<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeyToBooks extends Migration {

	public function up()
	{
		Schema::table('books', function(Blueprint $table)
		{
			$table
				->foreign('author_id')
				->references('id')
				->on('authors')
				->onDelete('restrict')
				->onUpdate('cascade');			
		});
	}


	public function down()
	{
		Schema::table('books', function(Blueprint $table)
		{
			$table->dropForeign('books_author_id_foreign');
		});
	}

}
