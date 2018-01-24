<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;
    protected $table ='productos';

    protected $fillable =['descripcion','stockAc', 'stockMax','stockMin','precioVenta','precioCompra','uniMed','id_marca','id_linea','id_sucursal','componente_generico'];

    public function marca(){
    	return $this->belongsTo('App\Models\Marca','id_marca');
    }
    public function linea(){
    	return $this->belongsTo('App\Models\Linea','id_linea');
    }
    public function detalle_ventas(){
    	return $this->hasMany('App\Models\DetalleVenta','id_producto');
    }
}
