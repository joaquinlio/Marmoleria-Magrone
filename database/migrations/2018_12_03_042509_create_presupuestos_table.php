<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePresupuestosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('presupuestos', function(Blueprint $table)
		{
			$table->integer('pto_id', true);
			$table->date('fecha');
			$table->integer('cliente')->index('cliente-fk');
			$table->integer('profecional')->index('profecional-fk');
			$table->integer('vendedor');
			$table->string('productos', 1500)->index('producto-fk');
			$table->string('canaldeventa', 20);
			$table->string('estado', 20)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('presupuestos');
	}

}
