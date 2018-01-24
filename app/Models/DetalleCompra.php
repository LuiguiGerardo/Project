<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    protected $table = "detalle_compras";

    protected $fillable= ['id_compra','id_producto','cantidad'];

    public function compra(){
    	return $this->belongsTo('App\Models\Compra','id_compra');
    }
    public function producto(){
    	return $this->belongsTo('App\Models\Producto','id_producto');
    }

}
