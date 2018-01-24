<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Personal extends Model
{
    use SoftDeletes;
    protected $table ='personals';

    protected $fillable =['nombre', 'apellido', 'dni','fecha_nacimiento','direccion','sueldo','telefono','sexo','email', 'id_ciudad','id_sucursal','id_cargo'];
    public function user(){
    	return $this->hasOne('App\User');
    }
    
    public function sucursal(){
    	return $this->belongsTo('App\Models\Sucursal','id_sucursal');
    }
    public function cargo(){
    	return $this->belongsTo('App\Models\Cargo','id_cargo');
    }
    public function ciudad(){
    	return $this->belongsTo('App\Models\Ciudad','id_ciudad');
    }
    
}
