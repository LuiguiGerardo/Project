<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoDoc extends Model
{
    use SoftDeletes;
    protected $table ='tipo_docs';

    protected $fillable =['descripcion'];
}
