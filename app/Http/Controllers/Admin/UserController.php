<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Personal;
use Hash;
class UserController extends Controller
{
    public function index(){

    	$users= User::paginate(10);
    	return view('online.personal.usuarios.index',compact('users'));
    }

    public function create(){
    	$personals= Personal::all();
    	
    	return view('online.personal.usuarios.create',compact('personals'));
    }
    public function updatePassword(Request $request,$id){
        $this->validate($request, [
                'mypassword'=>'required',
                'password'=>'required|min:6'                          
            ]);
        $comparar= User::find($id);
        if(Hash::check($request->mypassword, $comparar->password))
            {
                $user = new User;                
                $user->where('email','=',$comparar->email)
                        ->update(['password'=>bcrypt($request->password)]);

                return back()->with('notification','Contraseña actualizada correctamente');
            }
        else{
            return back()->with('notification','PASSWORD INCORRECTA');
        }
       /* $user= User::findOrFail($id);
        $user->name=$request->get('name');
        $user->password=$request->get('password');
        $user->email=$request->get('email');
        $user->id_personal=$request->get('id_personal');

        $user->save();

        return back()->with('notification','Usuario actualizado correctamente');*/
    }
}
