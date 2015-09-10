<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaProductos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('productos', function(Blueprint $table)
		{
			$table->bigIncrements('id');
                        $table->string('Codigo')->unique();
                        $table->string('CodigoBarra');
                        $table->string('CodigoLaboratorio');
                        $table->string('Nombre');
                        $table->string('Tipo');
                        $table->string('Condicion');
                        $table->boolean('GravaImpuesto');
                        $table->boolean('Fragil');
                        $table->boolean('Refrigerado');
                        $table->boolean('Toxico');
                        $table->string('PrincipioActivo');
                        $table->string('Clase');
                        $table->boolean('Nuevo');
                        $table->boolean('Marca');
                        $table->integer('ISV');
                        $table->integer('UMF');
                        $table->integer('PorcentajeUMF');
                        $table->string('Ingreso');
                        $table->string('Administrado');
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
		Schema::drop('productos');
	}

}
