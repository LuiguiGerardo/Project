<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Marca extends Model
{
    use SoftDeletes;
	protected $table ='marcas';

    protected $fillable =['descripcion', 'id_proveedor'];

    public function proveedor(){
    	return $this->belongsTo('App\Models\Proveedor','id_proveedor');
    }

    public function productos(){
    	return $this->hasMany('App\Models\Producto','id_marca');
    }
}
