<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = "detalle_ventas";

    protected $fillable= ['id_venta','id_producto','cantidad'];

    public function compra(){
    	return $this->belongsTo('App\Models\Venta','id_venta');
    }
    public function producto(){
    	return $this->belongsTo('App\Models\Producto','id_producto');
    }
}
