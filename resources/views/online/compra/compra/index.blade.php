@extends('online.layout.index')
@section('titulo')
<ol class="breadcrumb breadcrumb-bg-teal">
    <li><a href="/inicio"><i class="material-icons">home</i> Inicio</a></li>
    <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i> Compras</a></li>    
    <li class="active"><i class="material-icons">add_shopping_cart</i> Compras Registradas</li>
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
				
				<h3>Lista de compras</h3>
				<ul class="header-dropdown m-r--5">
					<a href="#" data-target="#modal-crear" data-toggle="modal"><button class="btn bg-teal btn-lg waves-effect pull-right">Nueva</button></a>
				</ul>
				
			</div>
			<div class="body table-responsive">				
				<table class="table" id="compras">
					<thead>
						<th>Id</th>
						<th>Proveedor</th>
						<th>Registrado Por</th>
						<th>Tipo</th>						
						<th>IGV</th>
						<th>Total</th>						
						<th>Opciones</th>						
					</thead>
					<tbody>
						@foreach($compras as $compra)
						<tr>
							<td>{{ $compra->id }}</td>
							<td>{{ $compra->proveedor->razon_social }}</td>
							<td>{{ $compra->personal->nombre.' '.$compra->personal->apellido}}</td>
							<td>{{ $compra->tipo_doc }}</td>
							<td>{{ $compra->igv }}</td>
							<td>{{ $compra->total }}</td>								
							<td>
								<a href="#" data-target="#modal-ver-{{ $compra->id }}" data-toggle="modal"><button class="btn btn-success btn-xs" title="Ver Detalles"><i class="material-icons">remove_red_eye</i></button></a>
							</td>
						</tr>
						@include('online.compra.compra.modal-ver')					
						@endforeach
					</tbody>
				</table>
				{{ $compras->links() }}
			</div>
		</div>
	</div>
</div>
	
@include('online.compra.compra.modal-crear')

@endsection

@section('scripts')	

<script>
	/*$(document).ready(function(){
		$('#compraes').DataTable({
			"processing": true,
	        "serverSide": true,
	        "ajax": "/api/compra",
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
		$('#compras').DataTable({
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