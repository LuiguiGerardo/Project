<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->char('documento',9);
            $table->enum('estado',['A','C','P']);
            $table->decimal('pagado',9,0);

            $table->integer('id_tipoDoc')->unsigned();
            $table->foreign('id_tipoDoc')->references('id')->on('tipo_docs');

            $table->integer('id_pedido')->unsigned();
            $table->foreign('id_pedido')->references('id')->on('pedidos');

            $table->integer('id_cliente')->unsigned();
            $table->foreign('id_cliente')->references('id')->on('clientes');

            $table->integer('id_personal')->unsigned();
            $table->foreign('id_personal')->references('id')->on('personals');

            $table->integer('id_formaPago')->unsigned();
            $table->foreign('id_formaPago')->references('id')->on('forma_pagos');

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
        Schema::dropIfExists('documentos');
    }
}
