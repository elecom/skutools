<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPedidos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pedidos', function(Blueprint $table)
		{
			$table->bigIncrements('id');
                        $table->integer('sede_id')->references('id')->on('sedes');
                        $table->string('NumeroPedido')->unique();
                        $table->string('CodigoCliente');
                        $table->integer('DescuentoNegociado');
                        $table->string('Status');
                        $table->string('NumeroOrden')->nullable();
                        $table->boolean('Enviado');
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
		Schema::drop('pedidos');
	}

}
