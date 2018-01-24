<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',100);
            $table->string('apellido',100);
            $table->string('dni',8)->unique();
            $table->date('fecha_nacimiento');
            $table->string('direccion',200);
            $table->decimal('sueldo',9,2);
            $table->string('telefono',20);
            $table->enum('sexo',['H','M']);
            $table->string('email',100)->unique();

            $table->integer('id_ciudad')->unsigned();
            $table->foreign('id_ciudad')->references('id')->on('ciudades');

            $table->integer('id_sucursal')->unsigned();
            $table->foreign('id_sucursal')->references('id')->on('sucursales');

            $table->integer('id_cargo')->unsigned();
            $table->foreign('id_cargo')->references('id')->on('cargos');

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
        Schema::dropIfExists('personals');
    }
}
