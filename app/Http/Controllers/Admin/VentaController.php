<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Venta;
use App\Models\DetalleVenta;
use App\Models\Cliente;
use App\Models\Producto;
use DB;

class VentaController extends Controller
{
    public function index(){
    	$clientes= Cliente::all();
    	$productos=Producto::all();
    	$ventas=Venta::paginate(10);

    	return view('online.venta.venta.index',compact('clientes','productos','ventas'));
    }
    public function store(Request $request){
    	
    	try{
    		DB::beginTransaction();
    		$venta= new Venta;
    		$venta->id_cliente=$request->get('id_cliente');    		
        	$venta->tipo_doc=$request->get('tipo_doc');
        	$venta->id_personal=$request->get('id_personal');
        	$venta->igv=18;
        	$venta->total=$request->get('total');
            $venta->n_documento=$request->get('n_documento');
        	$venta->save();

        	$idproducto=$request->get("id_producto");
        	$cantidad=$request->get("cantidad");
        	//$precio_venta=$request->get("precio_venta");
        	//$precio_venta=$request->get("precio_venta");
        	$cont=0;
        	while ($cont<count($idproducto)) {
        		$detalle_venta= new Detalleventa;
        		$detalle_venta->id_venta=$venta->id;
        		$detalle_venta->id_producto=$idproducto[$cont];
        		$detalle_venta->cantidad=$cantidad[$cont];
        		$detalle_venta->save();
        		$cont++;
        	}
        	DB::commit();
        	return back()->with('notification','Venta registrada correctamente');
        	//$ingreso->save();		
    	}catch(Exception $e){
    		DB::rollback();
    		return back()->with('borrar-error','Error, algo salió mal... Intente otra vez!');
    	}
    }
}
