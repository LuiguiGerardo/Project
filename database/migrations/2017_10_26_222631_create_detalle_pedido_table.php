<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallePedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->integer('id_pedido')->unsigned();
            $table->foreign('id_pedido')->references('id')->on('pedidos');

            $table->integer('id_producto')->unsigned();
            $table->foreign('id_producto')->references('id')->on('productos');

            $table->decimal('cantidad',9,0);
            $table->decimal('preUnit',9,0);

            $table->softDeletes();
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
        Schema::dropIfExists('detalle_pedidos');
    }
}
