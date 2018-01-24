<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cargo extends Model
{
    use SoftDeletes;
    protected $table = 'cargos';

    protected $fillable =['descripcion'];

    public function personals(){
    	return $this->hasMany('App\Models\Personal');
    }
}
