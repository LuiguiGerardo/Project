<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documento extends Model
{
    use SoftDeletes;
    protected $table ='documentos';

    protected $fillable =['documento', 'estado', 'pagado', 'id_tipoDoc', 'id_pedido', 'id_cliente', 'id_personal', 'id_formaPago'];
}
