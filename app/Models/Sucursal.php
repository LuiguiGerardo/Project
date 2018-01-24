<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Ciudad;
use App\Models\Personal;

class Sucursal extends Model
{
    use SoftDeletes;
    protected $table ='sucursales';

    protected $fillable =['direccion','id_ciudad'];

    public function ciudad(){
    	return $this->belongsTo('App\Models\Ciudad','id_ciudad');
    }
    public function personals(){
    	return $this->hasMany('App\Models\Personal','id_sucursal');
    }
}
