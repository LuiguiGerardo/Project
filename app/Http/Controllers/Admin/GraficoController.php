<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Charts;
use Carbon\Carbon;

class GraficoController extends Controller
{
    public function index(Request $request){
    		$fecha=Carbon::now();
    		$mes=$request->get("mes");
    		$año=$request->get("anio");
    		if($mes!=null && $año!=null){
    			$datos= DB::table('ventas as v')
    				->join('detalle_ventas as dv','v.id','=','dv.id_venta')
    				->join('productos as p','p.id','=','dv.id_producto')
    				->select('p.descripcion', DB::raw('sum(dv.cantidad) as cantidad'))
    				->whereYear('v.created_at','=',$año)
    				->whereMonth('v.created_at','=',$mes)
    				->groupBy('p.descripcion')->orderBy('cantidad','DESC')->get();
    			$trabajadores= DB::table('ventas as v')
    				->join('personals as p','p.id','=','v.id_personal')
    				->select(DB::raw('concat(p.nombre," ",p.apellido) as nombre_completo'),DB::raw('count(v.id) as n_ventas'))
    				->whereYear('v.created_at','=',$año)
    				->whereMonth('v.created_at','=',$mes)
    				->groupBy('nombre_completo')->orderBy('n_ventas','DESC')->get();
    		}
    		else{
    			$datos= DB::table('ventas as v')
    				->join('detalle_ventas as dv','v.id','=','dv.id_venta')
    				->join('productos as p','p.id','=','dv.id_producto')
    				->select('p.descripcion', DB::raw('sum(dv.cantidad) as cantidad'))
    				->whereYear('v.created_at','=',$fecha->year)
    				->whereMonth('v.created_at','=',$fecha->month)
    				->groupBy('p.descripcion')->orderBy('cantidad','DESC')->get();

    			$trabajadores= DB::table('ventas as v')
    				->join('personals as p','p.id','=','v.id_personal')
    				->select(DB::raw('concat(p.nombre," ",p.apellido) as nombre_completo'),DB::raw('count(v.id) as n_ventas'))
    				->whereYear('v.created_at','=',$fecha->year)
    				->whereMonth('v.created_at','=',$fecha->month)
    				->groupBy('nombre_completo')->orderBy('n_ventas','DESC')->get();
    		}
    	
    	//dd($datos);    					
    	return view('online.graficos.index',compact('datos','mes','año','trabajadores','fecha'));
    	
    }
    public function datos(Request $request){
    	$datos= DB::table('ventas as v')
    				->join('detalle_ventas as dv','v.id','=','dv.id_venta')
    				->join('productos as p','p.id','=','dv.id_producto')
    				->select('p.descripcion', 'dv.cantidad')
    				->whereMonth('v.created_at','=',$request->get('mes'))->get()->toJSON();
    	
    	return $datos;
    }
}
