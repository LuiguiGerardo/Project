<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    //
	protected $table ='detalle_pedidos';

    protected $fillable =['id_pedido', 'id_producto', 'cantidad','precUnit'];
}
