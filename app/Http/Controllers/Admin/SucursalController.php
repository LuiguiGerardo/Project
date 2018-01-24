<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Sucursal;
use App\Models\Ciudad;

class SucursalController extends Controller
{
    public function index(){
                    
            $sucursales=Sucursal::withTrashed()->paginate(10);
            $ciudades= Ciudad::all()->pluck('descripcion','id')->toArray();     
            return view("online.sucursal.index",compact('sucursales','ciudades'));
        
    	//$sucursales= Sucursal::paginate(4);
    	
    }
    public function store(Request $request){
    	$this->validate($request, [
    			'direccion'=>'required|min:5',
    			'id_ciudad'=>'required'    			
    		]);
    	Sucursal::create($request->all()); 	
    	//$sucursal->save();

    	return back()->with('notification','Sucursal registrada correctamente');
    }
    public function update(Request $request, $id){
    	$this->validate($request, [
    			'direccion'=>'required|min:5',
    			'id_ciudad'=>'required'    			
    		]);
    	$sucursal= Sucursal::findOrFail($id);
    	$sucursal->direccion=$request->get('direccion');
    	$sucursal->id_ciudad= $request->get('id_ciudad');
    	
    	$sucursal->save();

    	return back()->with('notification','Sucursal actualizada correctamente');
    }
    public function destroy($id){
        
        //Sucursal::findOrFail($id)->delete();
        $sucursal=Sucursal::find($id);
        if (count($sucursal->personals)>0) {
            return back()->with('borrar-error','No se puede eliminar sucursal porque tiene trabajadores asociados');
        }

        $sucursal->delete();
        return back()->with('notification','Sucursal eliminada correctamente');

    }
    public function restore($id){
        
        Sucursal::withTrashed()->findOrFail($id)->restore();

        return back()->with('notification','Sucursal restaurada correctamente');
    }
}
