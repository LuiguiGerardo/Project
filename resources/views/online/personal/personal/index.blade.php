@extends('online.layout.index')
@section('titulo')
<ol class="breadcrumb breadcrumb-bg-teal">
    <li><a href="/inicio"><i class="material-icons">home</i> Inicio</a></li>
    <li><a href="javascript:void(0);"><i class="material-icons">perm_identity</i> Trabajadores</a></li> 
</ol>
@endsection
@section('contenido')
@include('online.partes.errores')
@include('online.partes.notificaciones')
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				
				<h3>Lista de trabajadores</h3>
				<ul class="header-dropdown m-r--5">
					<a href="#" data-target="#modal-crear" data-toggle="modal"><button class="btn bg-teal btn-lg waves-effect pull-right">Nuevo</button></a>
				</ul>
				
			</div>
			<div class="body table-responsive">				
				<table class="table">
					<thead>
						<th>Id</th>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>DNI</th>						
						<th>Dirección</th>
						<th>Sueldo</th>
						<th>Cargo</th>
						<th>Sucursal</th>
						<th>Ciudad</th>
					</thead>
					<tbody>
						@foreach($personals as $personal)
						<tr>
							<td>{{ $personal->id }}</td>
							<td>{{ $personal->nombre }}</td>
							<td>{{ $personal->apellido }}</td>
							<td>{{ $personal->dni }}</td>
							<td>{{ $personal->direccion }}</td>
							<td>{{ $personal->sueldo }}</td>
							<td>{{ $personal->cargo->descripcion }}</td>
							<td>{{ $personal->sucursal->direccion }}</td>
							<td>{{ $personal->ciudad->descripcion }}</td>
							<td>
								<a href="#" data-target="#modal-editar-{{ $personal->id }}" data-toggle="modal"><button class="btn btn-success btn-xs" title="Editar"><i class="material-icons">mode_edit</i></button></a>
							</td>
						</tr>
						@include('online.personal.personal.modal-editar')
						@endforeach
					</tbody>
				</table>
				{{ $personals->links() }}
			</div>
		</div>
	</div>
</div>
@include('online.personal.personal.modal-crear')

@endsection
@section('scripts')
<script type="text/javascript" src="js/funciones/validar.js"></script>
<script type="text/javascript" src="js/funciones/personal.js"></script>
@endsection