<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Sucursal;
class Ciudad extends Model
{
    use SoftDeletes;
    protected $table ='ciudades';

    protected $fillable =['descripcion'];

    public function sucursales(){
    	return $this->hasMany('App\Models\Sucursal','id');
    }
    public function personals(){
    	return $this->hasMany('App\Models\Personal','id');
    }

    
}
