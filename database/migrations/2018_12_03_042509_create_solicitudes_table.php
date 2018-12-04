<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSolicitudesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('solicitudes', function(Blueprint $table)
		{
			$table->integer('sol_id', true);
			$table->date('fecha');
			$table->integer('cliente');
			$table->integer('profesional')->nullable();
			$table->integer('vendedor');
			$table->string('productos', 2000);
			$table->integer('totalPed')->nullable();
			$table->integer('descuento')->nullable();
			$table->integer('senia')->nullable();
			$table->integer('saldo')->nullable();
			$table->string('despacho', 20)->nullable();
			$table->string('canaldeventa', 20);
			$table->string('estado', 20)->nullable();
			$table->string('subEstado', 200)->nullable();
			$table->string('finalizado', 20);
			$table->string('imagen', 200)->nullable();
			$table->string('tipo', 20);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('solicitudes');
	}

}
