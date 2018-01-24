@extends('online.layout.index')
@section('titulo')
<ol class="breadcrumb breadcrumb-bg-teal">
    <li><a href="/inicio"><i class="material-icons">home</i> Inicio</a></li>
    <li><a href="javascript:void(0);"><i class="material-icons">store</i> Sucursales</a></li> 
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
				
				<h3>Lista de sucursales</h3>
				<ul class="header-dropdown m-r--5">
					<a href="#" data-target="#modal-crear" data-toggle="modal"><button class="btn bg-teal btn-lg pull-right">Nueva</button></a>
				</ul>				
				
			</div>
			<div class="body table-responsive" id="lista-sucursal">				
				<table class="table table-bordered table-striped table-hover js-basic-example dataTable" id='sucursales'>
					<thead>
						<th>Id</th>
						<th>Dirección</th>
						<th>Ciudad</th>
						<th>Opciones</th>
					</thead>
					<tbody>
						@foreach($sucursales as $sucursal)
						<tr>
							<td>{{ $sucursal->id }}</td>
							<td>{{ $sucursal->direccion }}</td>
							<td>{{ $sucursal->ciudad->descripcion }}</td>
							<td>
								<a href="#" data-target="#modal-editar-{{ $sucursal->id }}" data-toggle="modal"><button class="btn btn-success btn-xs" title="Editar"><i class="material-icons">mode_edit</i></button></a>
								@if($sucursal->trashed())
								<a href="#" data-target="#modal-restaurar-{{ $sucursal->id }}" data-toggle="modal"><button class="btn bg-indigo btn-xs" title="Restaurar"><i class="material-icons">restore</i></button></a>
								@else
								<a href="#" data-target="#modal-eliminar-{{ $sucursal->id }}" data-toggle="modal"><button class="btn btn-danger btn-xs" title="Eliminar"><i class="material-icons">delete</i></button></a>
								@endif
							</td>
						</tr>
						@include('online.sucursal.modal-editar')
						@include('online.sucursal.modal-restaurar')
						@include('online.sucursal.modal-eliminar')
						@endforeach
					</tbody>
				</table>
				{{ $sucursales->links() }}
			</div>
		</div>
	</div>
</div>
@include('online.sucursal.modal-crear')
@endsection
@section('scripts')
<script type="text/javascript">
	$(document).ready(function(){		
		$('#sucursales').DataTable({
			"language": {
				"processing": "Procesando...",
				"search": "Buscar:",
				"loadingRecords": "Cargando...",
	            "lengthMenu": "Mostrar _MENU_ registros",
	            "zeroRecords": "No se encontraron resultados",
	            "info": "Mostrando página _PAGE_ de _PAGES_",
	            "infoEmpty": "No se encontró coincidencia",
	            "infoFiltered": "(filtrada de _MAX_ registros)",
	            "paginate": {
			        "sFirst":    "Primero",
			        "sLast":     "Último",
			        "sNext":     "Siguiente",
			        "sPrevious": "Anterior"
			    			},
	        	},
		});
	});
</script>
@endsection