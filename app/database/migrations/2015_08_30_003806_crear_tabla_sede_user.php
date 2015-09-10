<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSedeUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sede_user', function(Blueprint $table)
		{
			$table->increments('id');
                        $table->integer('sede_id')
                                ->references('id')
                                ->on('sedes');
                        $table->integer('user_id')
                                ->references('id')
                                ->on('usuarios');
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
		Schema::drop('sede_user');
	}

}
