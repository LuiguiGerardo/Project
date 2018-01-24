@extends('online.layout.index')
@section('titulo')
<ol class="breadcrumb breadcrumb-bg-teal">
    <li><a href="/inicio"><i class="material-icons">home</i> Inicio</a></li>
    <li><a href="javascript:void(0);"><i class="material-icons">content_copy</i> Reportes</a></li> 
</ol>
@endsection
@section('contenido')
@include('online.partes.errores')
@include('online.partes.borrar-error')
@include('online.partes.notificaciones')
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				
				<h3>Reportes</h3>							
				
			</div>
			<div class="body table-responsive" id="lista-sucursal">				
				<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>									
					<th width="70%">Reporte</th>
					<th width="30%">Acciones</th>					
				</thead>
               <tbody>
               	<tr>
               		<th>Compras último mes</th>
               		<th><a href="/reporteCompras/1" target="_blank"><button class="btn btn-info">Ver</button></a>
               			<a href="/reporteCompras/2"><button class="btn btn-success">Descargar</button></a>
               		</th>               
               	</tr>               	
               	
               </tbody>				
			</table>
			</div>
		</div>
	</div>
</div>
@endsection
