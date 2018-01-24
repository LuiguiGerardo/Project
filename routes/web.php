<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['namespace'=>'Online'],function(){
	//Route::get('/', ['as'=>'login','uses'=>'OnlineController@login']);
   
});

Auth::routes();
Route::group(['namespace'=>'Admin'],function(){
    Route::get('/', ['as'=>'index','uses'=>'AdminController@index']);
});
Route::group(['middleware' => 'auth','namespace'=>'Admin'],function(){ //proteccion de rutas
	
	Route::get('/inicio', ['as'=>'inicio','uses'=>'AdminController@inicio']);
    //Route::get('/producto', ['as'=>'producto','uses'=>'AdminController@producto']);
    Route::group(['middleware'=>'admin'], function(){ //proteccion de rutas
        Route::get('/sucursal', ['as'=>'sucursal','uses'=>'SucursalController@index']);
        Route::post('/sucursal-crear','SucursalController@store');
        Route::post('/sucursal-editar/{id}','SucursalController@update');
        Route::get('/sucursal-eliminar/{id}','SucursalController@destroy');
        Route::get('/sucursal-restaurar/{id}','SucursalController@restore');

        Route::get('/personal', ['as'=>'personal','uses'=>'PersonalController@index']);
        Route::post('/personal-crear','PersonalController@store');
        Route::post('/personal-editar/{id}','PersonalController@update');

        Route::get('/user', 'UserController@index');
        Route::post('/user-editar/{id}', 'UserController@updatePassword');

        Route::get('/proveedor','ProveedorController@index');
        //Route::get('/api/proveedor','ProveedorController@api');
        Route::post('/proveedor-crear','ProveedorController@store');
        Route::post('/proveedor-editar/{id}','ProveedorController@update'); 
        Route::get('/proveedor-eliminar/{id}','ProveedorController@destroy'); 
        Route::get('/proveedor-restaurar/{id}','ProveedorController@restore');

        Route::get('/linea','LineaController@index');
        Route::post('/linea-crear','LineaController@store');
        Route::post('/linea-editar/{id}','LineaController@update');
        Route::get('/linea-eliminar/{id}','LineaController@destroy');
        Route::get('/linea-restaurar/{id}','LineaController@restore');

        Route::get('/marca','MarcaController@index');
        Route::post('/marca-crear','MarcaController@store');
        Route::post('/marca-editar/{id}','MarcaController@update');
        Route::get('/marca-eliminar/{id}','MarcaController@destroy');
        Route::get('/marca-restaurar/{id}','MarcaController@restore');

        Route::get('/compra','CompraController@index');
        Route::post('/compra-crear','CompraController@store');
        Route::get('/compra-ver/{id}','CompraController@show');        
        Route::get('/compra-proveedor/{id}/producto','CompraController@porProveedor');

        Route::get('/grafico','GraficoController@index');
        Route::get('/grafico-datos','GraficoController@datos');

        Route::get('/reporte','PdfController@index');
        Route::get('/reporteCompras/{tipo}','PdfController@reporteCompras'); 

    });  

    Route::get('/producto','ProductoController@index');
    Route::post('/producto-crear','ProductoController@store');
    Route::post('/producto-editar/{id}','ProductoController@update');
    Route::get('/producto-eliminar/{id}','ProductoController@destroy');
    Route::get('/producto-restaurar/{id}','ProductoController@restore');

    Route::get('/cliente','ClienteController@index');
    Route::post('/cliente-crear','ClienteController@store');
    Route::post('/cliente-editar/{id}','ClienteController@update');
    Route::get('/cliente-eliminar/{id}','ClienteController@destroy');
    Route::get('/cliente-restaurar/{id}','ClienteController@restore');

    Route::get('/venta','VentaController@index');
    Route::post('/venta-crear','VentaController@store');
    Route::get('/venta-ver/{id}','VentaController@show');     

});

//Route::get('/home', 'HomeController@index')->name('home');
