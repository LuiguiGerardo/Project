<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoSucursalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_sucursals', function (Blueprint $table) {
            $table->integer('id_producto')->unsigned();
            $table->foreign('id_producto')->references('id')->on('productos');

            $table->integer('id_sucursal')->unsigned();
            $table->foreign('id_sucursal')->references('id')->on('sucursales');

            $table->integer('stockAc');
            $table->string('observacion',100);

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
        Schema::dropIfExists('producto_sucursals');
    }
}
