<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaExistencias extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('existencias', function(Blueprint $table)
		{
			$table->bigIncrements('id');
                        $table->bigInteger('producto_id')
                                ->references('id')->on('productos');
                        $table->decimal('Precio', 10, 2);
                        $table->integer('Descuento');
                        $table->integer('Existencia');
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
		Schema::drop('existencias');
	}

}
