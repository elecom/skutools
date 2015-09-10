<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaInventarios extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inventarios', function(Blueprint $table)
		{
			$table->bigIncrements('id');
                        $table->integer('user_id')
                                ->references('id')
                                ->on('usuarios');
                        $table->string('Codigo');
                        $table->string('CodigoBarra');
                        $table->decimal('Precio', 10, 2);
                        $table->integer('Descuento');
                        $table->integer('Entrada');
                        $table->integer('Existencia');
                        $table->integer('DescuentoUfi')
                                ->default(0);
                        $table->integer('DescuentoEmpaque');
                        $table->integer('UnidadEmpaque');
                        $table->integer('DescuentoComercial');
                        $table->integer('DescuentoProntoPago');
                        $table->string('Lote');
                        $table->string('Vencimiento');
                        $table->integer('UnidadManejo');
                        $table->date('FechaVenta')
                                ->nullable();
                        $table->boolean('Nuevo')
                                ->default(false);
                        $table->boolean('EnPromocion')
                                ->default(false);
                        $table->integer('CodigoPromocion')
                                ->nullable();
                        
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
		Schema::drop('inventarios');
	}

}
