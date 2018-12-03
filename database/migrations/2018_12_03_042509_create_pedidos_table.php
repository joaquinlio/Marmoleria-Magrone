<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePedidosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pedidos', function(Blueprint $table)
		{
			$table->integer('pdo_id', true);
			$table->date('fecha');
			$table->integer('cliente')->index('cliente-fk');
			$table->integer('profecional')->nullable()->index('profecional-fk');
			$table->integer('vendedor');
			$table->string('productos', 2000)->index('producto-fk');
			$table->integer('totalPed')->nullable();
			$table->integer('descuento')->nullable();
			$table->integer('senia')->nullable();
			$table->integer('saldo')->nullable();
			$table->string('despacho', 20);
			$table->string('canaldeventa', 20);
			$table->string('estado', 20)->nullable();
			$table->string('subEstado', 200);
			$table->string('imagen', 200)->nullable();
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
