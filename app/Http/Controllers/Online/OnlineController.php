<?php

namespace App\Http\Controllers\Online;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OnlineController extends Controller
{
    public function login()
    {
        return view("online.layout.login");
    }
    public function index()
    {
    	return view("online.inicio.index");
    }
    public function producto(){

        return view("online.producto.index");
    }
    public function sucursal(){

        return view("online.sucursal.index");
    }
}
