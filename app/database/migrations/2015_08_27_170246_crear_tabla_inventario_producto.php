<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaInventarioProducto extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inventario_producto', function(Blueprint $table)
		{
			$table->bigIncrements('id');
                        $table->bigInteger('inventario_id')
                                ->references('id')
                                ->on('inventarios');
                        $table->bigInteger('producto_id')
                                ->references('id')
                                ->on('productos');
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
		Schema::drop('inventario_producto');
	}

}
