@extends('online.layout.index')
@section('titulo')

<ol class="breadcrumb breadcrumb-bg-teal">
    <li><a href="/inicio"><i class="material-icons">home</i> Inicio</a></li>
    <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i> Venta</a></li>    
    <li class="active"><i class="material-icons">person_pin</i> Cliente</li>
</ol>
@endsection
@section('contenido')
@include('online.partes.errores')
@include('online.partes.notificaciones')
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				
				<h3>Lista de clientes</h3>
				<ul class="header-dropdown m-r--5">
					<a href="#" data-target="#modal-crear" data-toggle="modal"><button class="btn bg-teal btn-lg waves-effect pull-right">Nuevo</button></a>
				</ul>
				
			</div>
			<div class="body table-responsive">				
				<table class="table" id="clientes">
					<thead>
						<th>Id</th>
						<th>Cliente</th>
						<th>Direccion</th>
						<th>Email</th>
						<th>Celular</th>
						<th>Teléfono</th>
						<th>Documento</th>
						<th>Fecha Nacimiento</th>										
						<th>Opciones</th>						
					</thead>
					<tbody>
						@foreach($clientes as $cliente)
						<tr>
							<td>{{ $cliente->id }}</td>
							<td>{{ $cliente->nombre.' '.$cliente->apellidos }}</td>
							<td>{{ $cliente->direccion }}</td>
							<td>{{ $cliente->email }}</td>
							<td>{{ $cliente->celular }}</td>
							<td>{{ $cliente->telefono }}</td>
							<td>{{ $cliente->documento }}</td>
							<td>{{ $cliente->fecha_nacimiento }}</td>												
							<td>
								<a href="#" data-target="#modal-editar-{{ $cliente->id }}" data-toggle="modal"><button class="btn btn-success btn-xs" title="Editar"><i class="material-icons">mode_edit</i></button></a>
								@if($cliente->trashed())
								<a href="#" data-target="#modal-restaurar-{{ $cliente->id }}" data-toggle="modal"><button class="btn bg-indigo btn-xs" title="Restaurar"><i class="material-icons">restore</i></button></a>
								@else
								<a href="#" data-target="#modal-eliminar-{{ $cliente->id }}" data-toggle="modal"><button class="btn btn-danger btn-xs" title="Eliminar"><i class="material-icons">delete</i></button></a>
								@endif
							</td>
						</tr>
						@include('online.venta.cliente.modal-editar')
						@include('online.venta.cliente.modal-eliminar')
						@include('online.venta.cliente.modal-restaurar')								
						@endforeach
					</tbody>
				</table>
				{{ $clientes->links() }}
			</div>
		</div>
	</div>
</div>

	
@include('online.venta.cliente.modal-crear')

@endsection

@section('scripts')	
<script type="text/javascript" src="js/funciones/validar.js"></script>
<script>
	
	/*$(document).ready(function(){
		$('#clientes').DataTable({
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