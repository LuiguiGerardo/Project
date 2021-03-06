<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',100);
            $table->integer('stockAc');
            $table->integer('stockMax');
            $table->integer('stockMin');
            $table->decimal('precioVenta',9,2);
            $table->decimal('precioCompra',9,2);
            $table->string('uniMed',10);
            $table->string('componente_generico',100);            

            $table->integer('id_linea')->unsigned();
            $table->foreign('id_linea')->references('id')->on('lineas'); 

            $table->integer('id_marca')->unsigned();
            $table->foreign('id_marca')->references('id')->on('marcas');

            $table->integer('id_sucursal')->unsigned();
            $table->foreign('id_sucursal')->references('id')->on('sucursales');    

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
        Schema::dropIfExists('productos');
    }
}
