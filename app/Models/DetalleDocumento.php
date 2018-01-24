<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleDocumento extends Model
{
    //
    protected $table ='detalle_documentos';

    protected $fillable =['id_documento', 'id_tipoDoc', 'id_producto', 'cantidad','precUnit', 'igv'];
}
