<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Linea;

class LineaController extends Controller
{
    public function index(){

    	$lineas= Linea::withTrashed()->paginate(10);

    	return view('online.inventario.linea.index',compact('lineas'));

    }
    public function store(Request $request){
    	$this->validate($request, [
    			'descripcion'=>'required'   			   			
    		]);
    	Linea::create($request->all());     	

    	return back()->with('notification','Linea registrada correctamente');
    }
    public function update(Request $request, $id){
    	$this->validate($request, [
    			'descripcion'=>'required'   			
    		]);
    	$linea= Linea::findOrFail($id);
    	$linea->descripcion=$request->get('descripcion');    	
    	
    	$linea->save();

    	return back()->with('notification','Linea actualizada correctamente');
    }
    public function destroy($id){
        
        Linea::findOrFail($id)->delete();

        return back()->with('notification','Linea eliminada correctamente');

    }
    public function restore($id){
        
        Linea::withTrashed()->findOrFail($id)->restore();

        return back()->with('notification','Linea restaurada correctamente');
    }
}
