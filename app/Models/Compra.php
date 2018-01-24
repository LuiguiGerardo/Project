<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = "compras";

    protected $fillable= ['id_proveedor','id_personal','n_documento','tipo_doc','igv','total'];

    public function proveedor(){
    	return $this->belongsTo('App\Models\Proveedor','id_proveedor');
    }
    public function personal(){
    	return $this->belongsTo('App\Models\Personal','id_personal');
    }
    public function detalles(){
    	return $this->hasMany('App\Models\DetalleCompra','id_compra');
    }
}
