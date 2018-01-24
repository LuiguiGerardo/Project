<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_documentos', function (Blueprint $table) {
            
            $table->integer('id_documento')->unsigned();
            $table->foreign('id_documento')->references('id')->on('documentos');

            $table->integer('id_tipoDoc')->unsigned();
            $table->foreign('id_tipoDoc')->references('id')->on('tipo_docs');            

            $table->integer('id_producto')->unsigned();
            $table->foreign('id_producto')->references('id')->on('productos');

            $table->decimal('cantidad',9,0);
            $table->decimal('precUnit',9,0);
            $table->decimal('igv',9,0);
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
        Schema::dropIfExists('detalle_documentos');
    }
}
