@extends('online.layout.index')
@section('titulo')
<ol class="breadcrumb breadcrumb-bg-teal">
    <li><a href="/inicio"><i class="material-icons">home</i> Inicio</a></li>
    <li><a href="javascript:void(0);"><i class="material-icons">local_convenience_store</i> Inventario</a></li>    
    <li class="active"><i class="material-icons">label</i> Marcas</li>
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
				
				<h3>Lista de marcas</h3>
				<ul class="header-dropdown m-r--5">
					<a href="#" data-target="#modal-crear" data-toggle="modal"><button class="btn bg-teal btn-lg waves-effect pull-right">Nueva</button></a>
				</ul>
				
			</div>
			<div class="body table-responsive">				
				<table class="table" id="marcas">
					<thead>
						<th>Id</th>
						<th>Descripción</th>
						<th>Proveedor</th>										
						<th>Opciones</th>						
					</thead>
					<tbody>
						@foreach($marcas as $marca)
						<tr>
							<td>{{ $marca->id }}</td>
							<td>{{ $marca->descripcion }}</td>
							<td>{{ @$marca->proveedor?$marca->proveedor->razon_social:'' }}</td>												
							<td>
								<a href="#" data-target="#modal-editar-{{ $marca->id }}" data-toggle="modal"><button class="btn btn-success btn-xs" title="Editar"><i class="material-icons">mode_edit</i></button></a>
								@if($marca->trashed())
								<a href="#" data-target="#modal-restaurar-{{ $marca->id }}" data-toggle="modal"><button class="btn bg-indigo btn-xs" title="Restaurar"><i class="material-icons">restore</i></button></a>
								@else
								<a href="#" data-target="#modal-eliminar-{{ $marca->id }}" data-toggle="modal"><button class="btn btn-danger btn-xs" title="Eliminar"><i class="material-icons">delete</i></button></a>
								@endif
							</td>
						</tr>
							@include('online.inventario.marca.modal-editar')
							@include('online.inventario.marca.modal-eliminar')
							@include('online.inventario.marca.modal-restaurar')					
						@endforeach
					</tbody>
				</table>
				{{ $marcas->links() }}
			</div>
		</div>
	</div>
</div>

	
@include('online.inventario.marca.modal-crear')

@endsection

@section('scripts')	

<script>
	
	/*$(document).ready(function(){
		$('#marcas').DataTable({
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
	});*/	
	
</script>
@endsection