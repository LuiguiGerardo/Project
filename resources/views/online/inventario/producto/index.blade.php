@extends('online.layout.index')
@section('titulo')
<ol class="breadcrumb breadcrumb-bg-teal">
    <li><a href="/inicio"><i class="material-icons">home</i> Inicio</a></li>
    <li><a href="javascript:void(0);"><i class="material-icons">local_convenience_store</i> Inventario</a></li>    
    <li class="active"><i class="material-icons">loyalty</i> Productos</li>
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
				
				<h3>Lista de productos</h3>
				<ul class="header-dropdown m-r--5">
					<a href="#" data-target="#modal-crear" data-toggle="modal"><button class="btn bg-teal btn-lg waves-effect pull-right">Nuevo</button></a>
				</ul>
				
			</div>
			<div class="body table-responsive">				
				<table class="table" id="productos">
					<thead>
						<th>Id</th>
						<th>Descripción</th>
						<th>Stock</th>
						<th>Precio Venta</th>
						<th>Componente Genérico</th>						
						<th>Marca</th>
						<th>Proveedor</th>										
						<th>Opciones</th>						
					</thead>
					<tbody>
						@foreach($productos as $producto)
						<tr>
							<td>{{ $producto->id }}</td>
							<td>{{ $producto->descripcion }}</td>
							<td>{{ $producto->stockAc }}</td>
							<td>{{ $producto->precioVenta }}</td>
							<td>{{ $producto->componente_generico }}</td>							
							<td>{{ $producto->marca->descripcion }}</td>
							<td>{{ $producto->marca->proveedor->razon_social }}</td>

							<td>
								<a href="#" data-target="#modal-editar-{{ $producto->id }}" data-toggle="modal"><button class="btn btn-success btn-xs" title="Editar"><i class="material-icons">mode_edit</i></button></a>
								@if($producto->trashed())
								<a href="#" data-target="#modal-restaurar-{{ $producto->id }}" data-toggle="modal"><button class="btn bg-indigo btn-xs" title="Restaurar"><i class="material-icons">restore</i></button></a>
								@else
								<a href="#" data-target="#modal-eliminar-{{ $producto->id }}" data-toggle="modal"><button class="btn btn-danger btn-xs" title="Eliminar"><i class="material-icons">delete</i></button></a>
								@endif
							</td>
						</tr>
						@include('online.inventario.producto.modal-editar')
						@include('online.inventario.producto.modal-eliminar')
						@include('online.inventario.producto.modal-restaurar')					
						@endforeach
					</tbody>
				</table>
				{{ $productos->links() }}
			</div>
		</div>
	</div>
</div>

@include('online.inventario.producto.modal-crear')

@endsection
