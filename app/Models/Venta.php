<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = "ventas";

    protected $fillable= ['id_cliente','id_personal','tipo_doc','n_documento','igv','total'];

    public function cliente(){
    	return $this->belongsTo('App\Models\Cliente','id_cliente');
    }
    public function personal(){
    	return $this->belongsTo('App\Models\Personal','id_personal');
    }
    public function detalles(){
    	return $this->hasMany('App\Models\DetalleVenta','id_venta');
    }
}
