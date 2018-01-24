<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use App\Models\Compra;
use App\Models\Venta;

class PdfController extends Controller
{
    public function index()
    {
    	return view('online.reportes.index');
    }
    public function crearPDF($datos, $vistaurl,$tipo)
    {
    	$compras = $datos;        
        $view =  \View::make($vistaurl, compact('compras'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        
        if($tipo==1){return $pdf->stream('reporte');}
        if($tipo==2){return $pdf->download('reporte.pdf'); }
    }
    public function reporteCompras($tipo)
    {
    	$vistaurl="online.reportes.pdf";
    	
     	$compras= Compra::whereMonth('created_at',Carbon::now()->month)
     			->whereYear('created_at',Carbon::now()->year)
     			->get();
     	
     
     	return $this->crearPDF($compras, $vistaurl,$tipo);
    }
}
