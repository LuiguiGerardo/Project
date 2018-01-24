<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Linea;
use App\Models\Marca;
use Carbon;

class ProductoController extends Controller
{
    public function index(){

    	$productos= Producto::withTrashed()->paginate(10);
    	$lineas= Linea::all();
    	$marcas=Marca::all();
        /*Optimizar
        $lineas= Linea::all()->pluck('descripcion','id')->toArray();;
        $marcas=Marca::all()->pluck('descripcion','id')->toArray();;
        */
        //INVESTIGAR JQUERY VALIDATE

    	return view('online.inventario.producto.index',compact('productos','marcas','lineas'));

    }
    public function store(Request $request){
    	$this->validate($request, [
    			'descripcion'=>'required',
                'stockMax'=>'required|numeric', 
                'stockMin'=>'required|numeric',
                'uniMed'=>'required',
                'precioCompra'=>'required|numeric',
                'precioVenta'=>'required',                
                'componente_generico'=>'min:3',                
                'id_linea'=>'required',
                'id_marca'=>'required'                
    		]);
    	$producto = new Producto;
        $producto->descripcion= $request->get('descripcion');    	
        $producto->stockAc= 0;
        $producto->stockMax= $request->get('stockMax');
        $producto->stockMin= $request->get('stockMin');
        $producto->uniMed= $request->get('uniMed');
        $producto->precioCompra= $request->get('precioCompra');
        $producto->precioVenta= $request->get('precioVenta');        
        $producto->componente_generico= $request->get('componente_generico');
        $producto->id_linea= $request->get('id_linea');
        $producto->id_marca= $request->get('id_marca');
        $producto->id_sucursal= \Auth::user()->personal->sucursal->id;
        $producto->save();

    	return back()->with('notification','Producto registrado correctamente');
    }
    public function update(Request $request, $id){
    	$this->validate($request, [
    			'descripcion'=>'required',
                'stockMin'=>'required|numeric',
                'stockMax'=>'required|numeric', 
                'uniMed'=>'required',
                'precioCompra'=>'required|numeric',
                'precioVenta'=>'required',                
                'componente_generico'=>'min:3',                
                'id_linea'=>'required',
                'id_marca'=>'required'    			
    		]);
    	$producto= Producto::find($id);
        $producto->descripcion= $request->get('descripcion');       
        $producto->stockAc= 0;
        $producto->stockMax= $request->get('stockMax');
        $producto->stockMin= $request->get('stockMin');
        $producto->uniMed= $request->get('uniMed');
        $producto->precioCompra= $request->get('precioCompra');
        $producto->precioVenta= $request->get('precioVenta');        
        $producto->componente_generico= $request->get('componente_generico');
        $producto->id_linea= $request->get('id_linea');
        $producto->id_marca= $request->get('id_marca');
        $producto->id_sucursal= \Auth::user()->personal->sucursal->id;
        $producto->save();
    	

    	return back()->with('notification','Producto actualizado correctamente');
    }
    public function destroy($id){
        
        $producto=Producto::find($id);
        
        if (count($producto->detalle_ventas)>0) {
            return back()->with('borrar-error','ERROR: No se puede eliminar producto');            
        }
        $producto->delete();

        return back()->with('notification','Producto eliminado correctamente');

    }
    public function restore($id){
        
        Producto::withTrashed()->find($id)->restore();

        return back()->with('notification','Producto restaurado correctamente');
    }
    public function ObtenerProductos(){
        $productos=Producto::all();

        return response()->json($productos);
    }
}
