<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaDetallesFacturas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('detallesfacturas', function(Blueprint $table)
		{
			$table->bigIncrements('id');
                        $table->bigInteger('factura_id')
                                ->references('id')
                                ->on('facturas');
                        $table->string('CodigoProducto');
                        $table->string('CodigoBarra');
                        $table->decimal('Precio');
                        $table->integer('Cantidad');
                        $table->decimal('Descuento', 10, 2);
                        $table->decimal('DescuentoUFI', 10, 2);
                        $table->decimal('DescuentoEmpaque', 10, 2);
                        $table->decimal('DescuentoComercial', 10, 2);
                        $table->integer('NumeroOrden');
                        $table->decimal('MontoDescuento', 10, 2);
                        $table->decimal('MontoNeto', 10, 2);
                        $table->decimal('Impuesto', 10, 2);
                        $table->string('Bulto');
                        $table->string('CodigoBulto');
                        $table->decimal('DctoProntoPago', 10, 2);
                        $table->integer('Regulado');
                        $table->string('Lote');
                        $table->string('FechaExpira');
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
		Schema::drop('detallesfacturas');
	}

}
