@extends('online.layout.index')
@section('titulo')
<ol class="breadcrumb breadcrumb-bg-teal">
    <li><a href="/inicio"><i class="material-icons">home</i> Inicio</a></li>
    <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i> Compras</a></li>    
    <li class="active"><i class="material-icons">local_shipping</i> Proveedores</li>
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
				
				<h3>Lista de proveedores</h3>
				<ul class="header-dropdown m-r--5">
					<a href="#" data-target="#modal-crear" data-toggle="modal"><button class="btn bg-teal btn-lg waves-effect pull-right">Nuevo</button></a>
				</ul>
				
			</div>
			<div class="body table-responsive">				
				<table class="table" id="proveedores">
					<thead>
						<th>Id</th>
						<th>Razón Social</th>
						<th>Dirección</th>
						<th>RUC</th>						
						<th>Correo</th>						
						<th>Opciones</th>						
					</thead>
					<tbody>
						@foreach($proveedores as $proveedor)
						<tr>
							<td>{{ $proveedor->id }}</td>
							<td>{{ $proveedor->razon_social }}</td>
							<td>{{ $proveedor->direccion }}</td>
							<td>{{ $proveedor->ruc }}</td>
							<td>{{ $proveedor->email }}</td>							
							<td>
								<a href="#" data-target="#modal-editar-{{ $proveedor->id }}" data-toggle="modal"><button class="btn btn-success btn-xs" title="Editar"><i class="material-icons">mode_edit</i></button></a>
								@if($proveedor->trashed())
								<a href="#" data-target="#modal-restaurar-{{ $proveedor->id }}" data-toggle="modal"><button class="btn bg-indigo btn-xs" title="Restaurar"><i class="material-icons">restore</i></button></a>
								@else
								<a href="#" data-target="#modal-eliminar-{{ $proveedor->id }}" data-toggle="modal"><button class="btn btn-danger btn-xs" title="Eliminar"><i class="material-icons">delete</i></button></a>
								@endif
							</td>
						</tr>
						@include('online.compra.proveedor.modal-editar')
						@include('online.compra.proveedor.modal-eliminar')
						@include('online.compra.proveedor.modal-restaurar')								
						@endforeach
					</tbody>
				</table>
				{{ $proveedores->links() }}
			</div>
		</div>
	</div>
</div>
	
@include('online.compra.proveedor.modal-crear')

@endsection

@section('scripts')	

<script>
	/*$(document).ready(function(){
		$('#proveedores').DataTable({
			"processing": true,
	        "serverSide": true,
	        "ajax": "/api/proveedor",
	        "colums": [
	        	{'data': 'id'},
	        	{'data': 'razon_social'},
	        	{'data': 'direccion'},
	        	{'data': 'ruc'},
	        	{'data': 'email'},
	        ]
		});
	    $('#lineas').DataTable();
	});*/
	$(document).ready(function(){
		$('#proveedores').DataTable({
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
	function valida(e){
	    tecla = (document.all) ? e.keyCode : e.which;

	    //Tecla de retroceso para borrar, siempre la permite
	    if (tecla==8){
	        return true;
	    }
	        
	    // Patron de entrada, en este caso solo acepta numeros
	    patron =/[0-9]/;
	    tecla_final = String.fromCharCode(tecla);
	    return patron.test(tecla_final);
	}
	
</script>
@endsection