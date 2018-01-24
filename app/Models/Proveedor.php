<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Proveedor extends Model
{
    use SoftDeletes;
    protected $table ='proveedores';

    protected $fillable =['razon_social','direccion', 'ruc', 'email','telefono'];

    public function marcas(){

    	return $this->hasMany('App\Models\Marca','id_proveedor');
    }
}
