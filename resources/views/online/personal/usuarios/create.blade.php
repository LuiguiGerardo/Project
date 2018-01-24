@extends('online.layout.index')
@section('titulo')
Usuarios
@endsection
@section('contenido')
@include('online.partes.errores')
@include('online.partes.notificaciones')
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				
				<h3>Crear de usuario</h3>				
				
			</div>
			<div class="body">			
				
				<div class="input-group">                        
                        <div class="form-line">
                            <input type="text" class="form-control" name="name" placeholder="Nombre" required>
                        </div>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>                         
                    </div>
			</div>
		</div>
	</div>
</div>


@endsection