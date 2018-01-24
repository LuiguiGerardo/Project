<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Cliente extends Model
{
     use SoftDeletes;
     protected $table ='clientes';

     protected $fillable =['nombre', 'apellidos', 'direccion', 'sexo', 'tipo_doc', 'email', 'celular', 'telefono', 'documento', 'fecha_nacimiento'];
}
