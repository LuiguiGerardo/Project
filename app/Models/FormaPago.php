<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormaPago extends Model
{
    use SoftDeletes;
    protected $table ='forma_pagos';

    protected $fillable =['descripcion'];
}
