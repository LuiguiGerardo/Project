<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use SoftDeletes;
	protected $table ='pedidos';

    protected $fillable =['pedio', 'estado', 'id_formapago', 'id_personal', 'id_cliente','id_sucursal'];
}
