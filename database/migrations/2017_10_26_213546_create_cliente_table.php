<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',100);
            $table->string('apellidos',100)->nullable();
            $table->string('direccion',100);
            $table->enum('sexo',['H','M']);
            $table->enum('tipo_doc',['D','R']);
            $table->string('documento',11);            
            $table->string('celular',20);
            $table->string('telefono',20);
            $table->string('email',100)->unique();
            $table->date('fecha_nacimiento',100);
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
        Schema::dropIfExists('clientes');
    }
}
