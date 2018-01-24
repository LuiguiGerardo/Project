<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductoSucursal extends Model
{
    //
    protected $table ='producto_sucursals';

    protected $fillable =['id_producto','id_sucursal','stockAc','observacion'];
}
