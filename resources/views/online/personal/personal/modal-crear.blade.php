<div class="modal fade in" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-crear">
	<form action="/personal-crear" method="POST" id="form-personal">	
		{{ csrf_field() }}	
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" 
					aria-label="Close">
	                     <span aria-hidden="true">×</span>
	                </button>
	                <h4 class="modal-title">Nuevo Trabajador</h4>
				</div>
				<div class="modal-body">
                    <div class="input-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Nombres</label>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombres" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Apellidos</label>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellidos" required>
                                </div>  
                            </div>
                        </div>                                       
                    </div>
                    
                    <div class="input-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>DNI</label>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="dni" id="dni" placeholder="DNI" onkeypress="return valida(event)" maxlength="8" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Fecha de nacimiento</label>
                                <div class="form-line">
                                    <input type="date" class="form-control" id="fecha_nacimientp" name="fecha_nacimiento" placeholder="Fecha de nacimiento" required>
                                </div>
                            </div>
                        </div>                   
                    </div>
                    <div class="input-group"> 
                        <div class="row">
                            <div class="col-md-8">
                                <label>Dirección</label>
                                <div class="form-line">
                                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Sueldo</label>
                                <div class="form-line">
                                    <input type="number" id="sueldo" min="0" step="any" id="sueldo" class="form-control" name="sueldo" placeholder="Sueldo" required>
                                </div>
                            </div>
                        </div>                  
                    </div>

                    <div class="input-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Género</label>                        
                                <div class="form-line">
                                     <select class="form-control" name="sexo" id="sexo" required>                                
                                            <option value="H">Hombre</option>
                                            <option value="M">Mujer</option>                                
                                    </select>  
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Teléfono</label>
                                 <div class="form-line">
                                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" required>
                                </div>
                            </div>
                        </div>
                        <label>Email</label>    
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" id="email" placeholder="ejemplo@ejemplo.com" required>
                        </div>                         
                    </div>

                 	<div class="input-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Ciudad-Nacimiento</label>                        
                                <div class="form-line">
                                    <select class="form-control" name="id_ciudad" id="id_ciudad">
                                        @foreach($ciudades as $ciudad)
                                            <option value="{{ $ciudad->id }}">{{ $ciudad->descripcion }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Sucursal</label>                        
                                <div class="form-line">
                                    <select class="form-control" name="id_sucursal" id="id_surcursal">
                                        @foreach($sucursales as $sucursal)
                                            <option value="{{ $sucursal->id }}">{{ $sucursal->direccion }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Cargo</label>                        
                                <div class="form-line">
                                    <select class="form-control" name="id_cargo" id="id_cargo">
                                        @foreach($cargos as $cargo)
                                            <option value="{{ $cargo->id }}">{{ $cargo->descripcion }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>   
                    </div>                            
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-link waves-effect">Guardar</button>
				</div>
			</div>
		</div>
	</form>
</div>
@section('scripts')
<script type="text/javascript">
   $("#form-personal").validate({
        messages:{
                nombre:"Por favor ingrese nombre",
                apellido:"Por favor ingrese apellido",
                dni:"Por favor ingrese dni",
                fecha_nacimiento:"Por favor ingrese fecha de nacimiento",
                direccion:"Por favor ingrese direccion",
                telefono:"Por favor ingrese telefono",
                sueldo:"Por favor ingrese sueldo",
                email:"Por favor ingrese correo"
        }

   });
</script>
@endsection