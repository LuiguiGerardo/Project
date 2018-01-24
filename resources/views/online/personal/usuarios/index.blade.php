@extends('online.layout.index')
@section('titulo')
<ol class="breadcrumb breadcrumb-bg-teal">
    <li><a href="/inicio"><i class="material-icons">home</i> Inicio</a></li>
    <li><a href="javascript:void(0);"><i class="material-icons">perm_identity</i> Usuarios</a></li> 
</ol>
@endsection
@section('contenido')
@include('online.partes.errores')
@include('online.partes.notificaciones')
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				
				<h3>Lista de usuarios</h3>
				<ul class="header-dropdown m-r--5">
					
				</ul>
				
			</div>
			<div class="body table-responsive">				
				<table class="table">
					<thead>
						<th>Id</th>
						<th>Usuario</th>
						<th>Email</th>											
						<th>Trabajdor</th>
						<th>Opciones</th>						
					</thead>
					<tbody>
						@foreach($users as $user)
						<tr>
							<td>{{ $user->id }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>							
							<td>{{ $user->personal->nombre.' '.$user->personal->apellido }}</td>							
							<td>
								<a href="#" data-target="#modal-editar-{{ $user->id }}" data-toggle="modal"><button class="btn btn-success btn-xs" title="Cambiar Contraseña"><i class="material-icons">vpn_key</i></button></a>
							</td>
						</tr>
						@include('online.personal.usuarios.modal-editar')
						@endforeach
					</tbody>
				</table>
				{{ $users->links() }}
			</div>
		</div>
	</div>
</div>


@endsection