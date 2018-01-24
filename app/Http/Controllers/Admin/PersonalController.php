<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Personal;
use App\Models\Cargo;
use App\Models\Ciudad;
use App\Models\Sucursal;
use App\User;
use DB;

class PersonalController extends Controller
{
    public function index(){
    	$cargos = Cargo::all();
    	$sucursales= Sucursal::all();
    	$personals=Personal::paginate(10);
    	$ciudades= Ciudad::all();

    	return view('online.personal.personal.index',compact('cargos','sucursales','personals','ciudades'));
    }
    public function store(Request $request){
    	$this->validate($request, [
    			'nombre'=>'required',
    			'apellido'=>'required',
    			'dni'=>'required|unique:personals',
    			'fecha_nacimiento'=>'required',
    			'direccion'=>'required|min:5',
    			'sueldo'=>'required',
    			'telefono'=>'required|numeric',
    			'sexo'=>'required',
    			'email'=>'required|unique:personals',
    			'id_ciudad'=>'required',
    			'id_sucursal'=>'required',
    			'id_cargo'=>'required'    			  			
    		]);

        try{
            DB::beginTransaction();
            $personal= new Personal;
            $personal->nombre= $request->get('nombre');
            $personal->apellido= $request->get('apellido');
            $personal->dni= $request->get('dni');
            $personal->fecha_nacimiento= $request->get('fecha_nacimiento');
            $personal->direccion= $request->get('direccion');
            $personal->sueldo= $request->get('sueldo');
            $personal->telefono= $request->get('telefono');
            $personal->sexo= $request->get('sexo');
            $personal->email= $request->get('email');
            $personal->id_ciudad= $request->get('id_ciudad');       
            $personal->id_sucursal= $request->get('id_sucursal');
            $personal->id_cargo= $request->get('id_cargo');
            $personal->save();

            $nombre=$request->get('nombre');
            $apellido=$request->get('apellido');
            $user= new User;
            $user->name=$nombre.''.substr($apellido, 0, 1); //Nombre + Primera Letra de Apellido
            $user->email=$request->get('email');
            $user->password=bcrypt($request->get('dni')); //Encripta la contraseña
            $user->id_personal= $personal->id; //Asigna el id del personal recien creado
            $user->save();

            DB::commit();
            return back()->with('notification','Trabajor registrado correctamente');

        }catch(Exception $e)
        {
            DB::rollback();
            return back()->with('notification','Error en el registro');
        }     
    	
    }

    public function update(Request $request, $id){
    	$this->validate($request, [
    			'nombre'=>'required',
    			'apellido'=>'required',
    			'dni'=>'required',
    			'fecha_nacimiento'=>'required',
    			'direccion'=>'required|min:5',
    			'sueldo'=>'required',
    			'telefono'=>'required|numeric',
    			'sexo'=>'required',
    			'email'=>'required',
    			'id_ciudad'=>'required',
    			'id_sucursal'=>'required',
    			'id_cargo'=>'required'    			  			
    		]);
        /*unique:users,email,'$id.',id'*/
    	$personal= Personal::find($id);
    	$personal->nombre= $request->get('nombre');
    	$personal->apellido= $request->get('apellido');
    	$personal->dni= $request->get('dni');
    	$personal->fecha_nacimiento= $request->get('fecha_nacimiento');
    	$personal->direccion= $request->get('direccion');
    	$personal->sueldo= $request->get('sueldo');
    	$personal->telefono= $request->get('telefono');
    	$personal->sexo= $request->get('sexo');
    	$personal->email= $request->get('email');
    	$personal->id_ciudad= $request->get('id_ciudad');    	
    	$personal->id_sucursal= $request->get('id_sucursal');
    	$personal->id_cargo= $request->get('id_cargo');
    	$personal->save();

    	return back()->with('notification','Trabajor modificado correctamente');
    }
}
