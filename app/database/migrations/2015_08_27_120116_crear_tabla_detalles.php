<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaDetalles extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('detalles', function(Blueprint $table)
		{
			$table->bigIncrements('id');
                        $table->bigInteger('pedido_id')
                                ->references('id')
                                ->on('pedidos');
                        $table->bigInteger('producto_id')
                                ->references('id')
                                ->on('productos');
                        $table->integer('Cantidad');
                        $table->integer('DescuentoNegociado');
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
		Schema::drop('detalles');
	}

}
