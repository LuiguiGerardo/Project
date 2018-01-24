<div class="modal fade in" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-editar-{{ $marca->id }}">
	<form action="/marca-editar/{{ $marca->id }}" method="POST">	
		{{ csrf_field() }}	
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" 
					aria-label="Close">
	                     <span aria-hidden="true">×</span>
	                </button>
	                <h4 class="modal-title">Editar Marca</h4>
				</div>
				<div class="modal-body">
                    <div class="input-group">
                    	<label>Descripción</label>                                             
                        <div class="form-line">
                            <input type="text" class="form-control" name="descripcion" value="{{ $marca->descripcion }}" placeholder="Descripción" required>
                        </div>
                        <div class="form-line">
                        	<select class="form-control" name="id_proveedor">
                        		@foreach($proveedores as $proveedor)
                        			@if($proveedor->id == $marca->id_proveedor)
                        				<option value="{{ $proveedor->id }}" selected>{{ $proveedor->razon_social }}</option>
                        			@else
										<option value="{{ $proveedor->id }}">{{ $proveedor->razon_social }}</option>
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