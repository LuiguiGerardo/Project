<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Compra;
use App\Models\DetalleCompra;
use App\Models\Proveedor;
use App\Models\Personal;
use App\Models\Producto;
use App\Models\Marca;
use DB;
class CompraController extends Controller
{
    public function index(){

    	$compras= Compra::paginate(10);
    	$proveedores= Proveedor::all();
    	$productos= Producto::all();
    	return view('online.compra.compra.index',compact('compras','proveedores','productos'));
    }

    public function store(Request $request){
    	
    	//dd($request->all());
    	try{
    		DB::beginTransaction();
    		$compra= new Compra;
    		$compra->id_proveedor=$request->get('id_proveedor');    		
        	$compra->tipo_doc=$request->get('tipo_doc');
        	$compra->id_personal=$request->get('id_personal');
        	$compra->igv=18;
        	$compra->total=$request->get('total');
            $compra->n_documento=$request->get('n_documento');
        	$compra->save();

        	$idproducto=$request->get("id_producto");
        	$cantidad=$request->get("cantidad");
        	//$precio_compra=$request->get("precio_compra");
        	//$precio_venta=$request->get("precio_venta");
        	$cont=0;
        	while ($cont<count($idproducto)) {
        		$detalle_compra= new DetalleCompra;
        		$detalle_compra->id_compra=$compra->id;
        		$detalle_compra->id_producto=$idproducto[$cont];
        		$detalle_compra->cantidad=$cantidad[$cont];
        		$detalle_compra->save();
        		$cont++;
        	}
        	DB::commit();
        	return back()->with('notification','Compra registrada correctamente');
        	//$ingreso->save();		
    	}catch(Exception $e){
    		DB::rollback();
    		return back()->with('borrar-error','Error, algo salió mal... Intente otra vez!');
    	}
    	
    }
    public function show($id){
    	$compra= Compra::find($id);
    	return view('online.compra.compra.ver',compact('compra'));

    }

    public function porProveedor($id)
    {	
    	//$proveedor= Proveedor::where('id',$id)->get();
    	$productos= DB::table('productos as p')
    				->join('marcas as m','p.id_marca','=','m.id')
    				->join('proveedores as pv','m.id_proveedor','=','pv.id')
    				->select('p.id','p.descripcion','p.precioCompra','p.precioVenta')
    				->where('pv.id','=',$id)->get();
    	//$marcas= $proveedor->marcas();
    	//dd($proveedor);

        return $productos;
    }

}
