<div class="modal fade in" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-editar-{{ $personal->id }}">
	<form action="/personal-editar/{{ $personal->id }}" method="POST">	
		{{ csrf_field() }}	
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" 
					aria-label="Close">
	                     <span aria-hidden="true">×</span>
	                </button>
	                <h4 class="modal-title">Editar Personal</h4>
				</div>
				<div class="modal-body">
                    <div class="input-group">                        
                        <div class="form-line">
                            <input type="text" class="form-control" name="nombre" value="{{ $personal->nombre }}"  required>                            
                        </div>
                        <div class="form-line">
                            <input type="text" class="form-control" name="apellido" value="{{ $personal->apellido }}" placeholder="Apellidos" required>
                        </div>                         
                    </div>
                    <div class="input-group">                        
                        <div class="form-line">
                            <input type="text" class="form-control" name="dni" value="{{ $personal->dni }}" placeholder="DNI" required>
                        </div>
                        <label>Fecha de Nacimiento</label>
                        <div class="form-line">
                            <input type="date" class="form-control" name="fecha_nacimiento" value="{{ $personal->fecha_nacimiento }}" placeholder="Fecha de nacimiento" required>
                        </div>                         
                    </div>
                    <div class="input-group">                        
                        <div class="form-line">
                            <input type="text" class="form-control" name="direccion" value="{{ $personal->direccion }}" placeholder="Dirección" required>
                        </div>
                        <div class="form-line">
                            <input type="texto" class="form-control" name="sueldo" value="{{ $personal->sueldo }}" placeholder="Sueldo" required>
                        </div>                         
                    </div>

                    <div class="input-group">                        
                        <div class="form-line">
                             <select class="form-control" name="sexo" required>
                             		@if($personal->sexo=='H')                                
	                                    <option value="H" selected>Hombre</option>
	                                    <option value="M">Mujer</option>
                                    @else
	                                    <option value="H">Hombre</option>
	                                    <option value="M" selected>Mujer</option>
                                    @endif                                
                            </select>
                        </div>
                        <div class="form-line">
                            <input type="text" class="form-control" name="telefono" value="{{ $personal->telefono }}" placeholder="Teléfono" required>
                        </div>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" value="{{ $personal->email }}" placeholder="Email" required>
                        </div>                         
                    </div>

                 	<div class="input-group">
                        
                        <label>Ciudad</label>
                        <div class="form-line">
                            <select class="form-control" name="id_ciudad">
                                @foreach($ciudades as $ciudad)
                                	@if($ciudad->id==$personal->id_ciudad)
                                    <option value="{{ $ciudad->id }}" selected>{{ $ciudad->descripcion }}</option>
                                    @else
                                    <option value="{{ $ciudad->id }}">{{ $ciudad->descripcion }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <label>Sucursal</label>
                        <div class="form-line">
                            <select class="form-control" name="id_sucursal">
                                @foreach($sucursales as $sucursal)
                                	@if($sucursal->id==$personal->id_sucursal)
                                    <option value="{{ $sucursal->id }}" selected>{{ $sucursal->direccion }}</option>
                                    @else
                                    <option value="{{ $sucursal->id }}">{{ $sucursal->direccion }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <label>Cargo</label>
                        <div class="form-line">
                            <select class="form-control" name="id_cargo">
                                @foreach($cargos as $cargo)
                                	@if($cargo->id==$personal->id_cargo)
                                    <option value="{{ $cargo->id }}" selected>{{ $cargo->descripcion }}</option>
                                    @else
                                    <option value="{{ $cargo->id }}">{{ $cargo->descripcion }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>                           
                    </div>             
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-link waves-effect">Actualizar</button>
				</div>
			</div>
		</div>
	</form>
</div>