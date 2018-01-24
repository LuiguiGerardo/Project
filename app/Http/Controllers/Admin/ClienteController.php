<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cliente;

class ClienteController extends Controller
{
    
    public function index()
    {
        $clientes=Cliente::withTrashed()->paginate(10);
        return view('online.venta.cliente.index',compact('clientes'));
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
                'nombre'=>'required',
                'apellidos'=>'required',
                'tipo_doc'=>'required',
                'documento'=>'required',
                'fecha_nacimiento'=>'required',
                'direccion'=>'required|min:5',
                'celular'=>'required|numeric',
                'telefono'=>'required|numeric',
                'sexo'=>'required',
                'email'=>'required|unique:clientes'       
            ]);

            $cliente= new Cliente;
            $cliente->nombre= $request->get('nombre');
            $cliente->apellidos= $request->get('apellidos');
            $cliente->tipo_doc= $request->get('tipo_doc');
            $cliente->documento= $request->get('documento');
            $cliente->fecha_nacimiento= $request->get('fecha_nacimiento');
            $cliente->direccion= $request->get('direccion');
            $cliente->celular= $request->get('celular');
            $cliente->telefono= $request->get('telefono');
            $cliente->sexo= $request->get('sexo');
            $cliente->email= $request->get('email');            
            $cliente->save();

            return back()->with('notification','Cliente registrado correctamente');
    }   
   
    public function update(Request $request, $id)
    {
        $this->validate($request, [
                'nombre'=>'required',
                'apellidos'=>'required',
                'tipo_doc'=>'required',
                'documento'=>'required',
                'fecha_nacimiento'=>'required',
                'direccion'=>'required|min:5',
                'celular'=>'required|numeric',
                'telefono'=>'required|numeric',
                'sexo'=>'required',
                'email'=>'required'       
            ]);

            $cliente= new Cliente;
            $cliente->nombre= $request->get('nombre');
            $cliente->apellidos= $request->get('apellidos');
            $cliente->tipo_doc= $request->get('tipo_doc');
            $cliente->documento= $request->get('documento');
            $cliente->fecha_nacimiento= $request->get('fecha_nacimiento');
            $cliente->direccion= $request->get('direccion');
            $cliente->celular= $request->get('celular');
            $cliente->telefono= $request->get('telefono');
            $cliente->sexo= $request->get('sexo');
            $cliente->email= $request->get('email');            
            $cliente->save();

            return back()->with('notification','Cliente actualizado correctamente');
    }
    
    public function destroy($id){
        
        //Sucursal::findOrFail($id)->delete();
        $cliente=Cliente::find($id);
        
        $cliente->delete();
        return back()->with('notification','Cliente eliminado correctamente');

    }
    public function restore($id){
        
        Cliente::withTrashed()->find($id)->restore();

        return back()->with('notification','Cliente restaurado correctamente');
    }
}
