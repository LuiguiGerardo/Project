<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_proveedor')->unsigned();
            $table->foreign('id_proveedor')->references('id')->on('proveedores');
            $table->integer('id_personal')->unsigned();
            $table->foreign('id_personal')->references('id')->on('personals');
            $table->string('n_documento',11);
            $table->enum('tipo_doc',['F','B']);
            $table->decimal('igv',9,2);
            $table->decimal('total',11,2);          
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
        Schema::dropIfExists('compras');
    }
}
