<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Personal;
use App\Models\Sucursal;
use App\Models\Proveedor;
use App\Models\Producto;
use App\Models\Venta;
use App\Models\Compra;
use DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(){

    	return view('auth.login'); 
    }
    public function inicio()
    {
        $fecha=Carbon::now();       

        $users=User::count();
        $personals=Personal::count();
        $sucursales=Sucursal::count();
        $proveedores=Proveedor::count();
        $ventas=Venta::count();
        $compras=Compra::count();
        $productos=Producto::count();        
        $productoAño= DB::table('ventas as v')
                    ->join('detalle_ventas as dv','v.id','=','dv.id_venta')
                    ->join('productos as p','p.id','=','dv.id_producto')
                    ->select('p.descripcion', DB::raw('sum(dv.cantidad) as cantidad'))
                    ->whereYear('v.created_at','=',$fecha->year)
                    ->whereMonth('v.created_at','=',$fecha->month)                    
                    ->groupBy('p.descripcion')->orderBy('cantidad','DESC')->first();

                $trabajadorAño= DB::table('ventas as v')
                    ->join('personals as p','p.id','=','v.id_personal')
                    ->select(DB::raw('concat(p.nombre," ",p.apellido) as nombre_completo'),DB::raw('count(v.id) as n_ventas'))
                    ->whereYear('v.created_at','=',$fecha->year)
                    ->whereMonth('v.created_at','=',$fecha->month)                    
                    ->groupBy('nombre_completo')->orderBy('n_ventas','DESC')->first();
               //dd($trabajadorAño);
    	return view("online.inicio.index",compact('users','personals','sucursales','proveedores','ventas','compras','productos','productoAño','trabajadorAño','fecha'));
    }
    public function producto(){

        return view("online.producto.index");
    }
    public function sucursal(){

        return view("online.sucursal.index");
    }
}
