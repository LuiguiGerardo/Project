<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->char('pedio',9);
            $table->enum('estado',['A','C','P']);

            $table->integer('id_formapago')->unsigned();
            $table->foreign('id_formapago')->references('id')->on('forma_pagos');

            $table->integer('id_personal')->unsigned();
            $table->foreign('id_personal')->references('id')->on('personals');

            $table->integer('id_cliente')->unsigned();
            $table->foreign('id_cliente')->references('id')->on('clientes');

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
        Schema::dropIfExists('pedidos');
    }
}
