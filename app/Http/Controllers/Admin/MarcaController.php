<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Marca;
use App\Models\Proveedor;
class MarcaController extends Controller
{
    public function index(){

    	$marcas= Marca::withTrashed()->paginate(10);
    	$proveedores= Proveedor::all();

    	return view('online.inventario.marca.index',compact('marcas','proveedores'));

    }
    public function store(Request $request){
    	$this->validate($request, [
    			'descripcion'=>'required',
    			'id_proveedor'=>'required'   			   			
    		]);
    	Marca::create($request->all());     	

    	return back()->with('notification','Marca registrada correctamente');
    }
    public function update(Request $request, $id){
    	$this->validate($request, [
    			'descripcion'=>'required',
    			'id_proveedor'=>'required'    			
    		]);
    	$marca= Marca::findOrFail($id);
    	$marca->descripcion=$request->get('descripcion');
    	$marca->id_proveedor=$request->get('id_proveedor');      	
    	
    	$marca->save();

    	return back()->with('notification','Marca actualizada correctamente');
    }
    public function destroy($id){
        
        $marca=Marca::find($id);
        if (count($marca->productos)>0) {
            return back()->with('borrar-error','No se puede eliminar marca porque tiene productos asociados');
        }

        $marca->delete();
        return back()->with('notification','Marca eliminada correctamente');

    }
    public function restore($id){
        
        Marca::withTrashed()->findOrFail($id)->restore();

        return back()->with('notification','Marca restaurada correctamente');
    }
}
