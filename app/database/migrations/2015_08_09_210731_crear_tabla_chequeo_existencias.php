<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaChequeoExistencias extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chequeo_existencias', function(Blueprint $table)
		{
			$table->bigIncrements('id');
                        $table->date('fecha');
                        $table->time('hora');
                        $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('chequeo_existencias');
	}

}
