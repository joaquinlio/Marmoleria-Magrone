<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clientes', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('nombre', 50);
			$table->string('direccion', 50);
			$table->string('entrecalles', 50)->nullable();
			$table->string('observaciones', 50)->nullable();
			$table->string('localidad', 50);
			$table->string('partido', 50)->nullable();
			$table->string('provincia', 50);
			$table->string('telefono1', 50);
			$table->string('telefono2', 50)->nullable();
			$table->string('factura', 10)->nullable();
			$table->string('cuit', 50)->nullable();
			$table->string('razonsocial', 50)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('clientes');
	}

}
