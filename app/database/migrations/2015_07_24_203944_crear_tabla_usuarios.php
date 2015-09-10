<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaUsuarios extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuarios', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->integer('rol_id')
                                ->references('id')
                                ->on('roles');
                        $table->integer('sede_id')
                                ->nullable()
                                ->references('id')
                                ->on('sedes');
                        $table->string('Codigo') // RIF 
                                ->nullable();
                        $table->string('Nombre');
                        $table->string('Email')
                                ->unique();
                        $table->string('Password');
                        $table->string('Telefono1')
                                ->nullable();
                        $table->string('Telefono2')
                                ->nullable();
                        $table->string('Direccion')
                                ->nullable();
                        $table->string('Usuario_Wservices')
                                ->nullable();
                        $table->string('Password_Wservices')
                                ->nullable();
                        $table->string('Codigo_Cliente')
                                ->nullable();
                        $table->boolean('Activo')
                                ->default(false);
                        $table->boolean('PrimeraVez')
                                ->default(true);
                        $table->rememberToken();
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
		Schema::drop('usuarios');
	}

}
