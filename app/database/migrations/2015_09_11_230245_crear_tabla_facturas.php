<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaFacturas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('facturas', function(Blueprint $table)
		{
			$table->bigIncrements('id');
                        $table->string('NumeroFactura');
                        $table->string('FechaEmision');
                        $table->string('FechaVencimiento');
                        $table->decimal('TotalMedicinas', 10, 2);
                        $table->decimal('TotalMiscelaneos', 10, 2);
                        $table->decimal('ProntoPagoMedicinas', 10, 2);
                        $table->decimal('ProntoPagoMiscelaneos', 10, 2);
                        $table->decimal('Impuesto', 10, 2);
                        $table->decimal('Total', 10, 2);
                        $table->decimal('DctoPPMedicinas', 10, 2);
                        $table->decimal('DctoMiscelaneos', 10, 2);
                        $table->decimal('DctoComercial', 10, 2);
                        $table->decimal('DctoInternet', 10, 2);
                        $table->decimal('DctoEspecial', 10, 2);
                        $table->decimal('DctoVolumen', 10, 2);
                        $table->integer('TotalRenglones');
                        $table->integer('TotalUnidades');
                        $table->string('Guiasicm');
                        
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
		Schema::drop('facturas');
	}

}
