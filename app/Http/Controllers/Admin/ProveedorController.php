<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Proveedor;
use Yajra\Datatables\Facades\Datatables;

class ProveedorController extends Controller
{
    public function index(){

    	$proveedores=Proveedor::withTrashed()->paginate(10);

    	return view('online.compra.proveedor.index',compact('proveedores'));
        //return view('online.inventario.proveedor.index');
        
    }

    public function api(){
        return Datatables::eloquent(Proveedor::query())->make(true);
    }

    public function store(Request $request){
    	$this->validate($request, [
    			'razon_social'=>'required|min:3',
    			'direccion'=>'required',
    			'ruc'=>'required|digits:11',
    			'email'=>'required|unique:proveedores',
                'telefono'=>'required'    			
    		]);

    	Proveedor::create($request->all());

    	return back()->with('notification','Proveedor registrado correctamente');

    }
    public function update(Request $request,$id){
        $this->validate($request, [
                'razon_social'=>'required|min:3',
                'direccion'=>'required',
                'ruc'=>'required|digits:11',
                'email'=>'required',
                'telefono'=>'required'              
            ]);
        $proveedor= Proveedor::findOrFail($id);
        $proveedor->razon_social=$request->get('razon_social');
        $proveedor->direccion=$request->get('direccion');
        $proveedor->ruc=$request->get('ruc');
        $proveedor->email=$request->get('email');
        $proveedor->telefono=$request->get('telefono');  
        $proveedor->save();

        return back()->with('notification','Proveedor actualizado correctamente');
    }
    public function destroy($id){
        
        //Proveedor::findOrFail($id)->delete();
        $proveedor=Proveedor::find($id);

        if (count($proveedor->marcas)>0) {
            return back()->with('borrar-error','No se puede eliminar proveedor porque tiene marcas o productos asociados');
        }
        $proveedor->delete();
        return back()->with('notification','Proveedor eliminado correctamente');

    }
    public function restore($id){
        
        Proveedor::withTrashed()->findOrFail($id)->restore();

        return back()->with('notification','Proveedor restaurado correctamente');
    }
}
