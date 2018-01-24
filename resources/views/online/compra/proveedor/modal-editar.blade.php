<div class="modal fade in" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-editar-{{ $proveedor->id }}">
	<form action="/proveedor-editar/{{ $proveedor->id }}" method="POST">	
		{{ csrf_field() }}	
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" 
					aria-label="Close">
	                     <span aria-hidden="true">×</span>
	                </button>
	                <h4 class="modal-title">Editar Proveedor</h4>
				</div>
				<div class="modal-body">
                    <div class="input-group">                                             
                        <div class="form-line">
                            <input type="text" class="form-control" name="razon_social" value="{{ $proveedor->razon_social }}" placeholder="Razón Social" required>
                        </div>
                        
                        <div class="form-line">
                            <input type="text" class="form-control" name="direccion" value="{{ $proveedor->direccion }}" placeholder="Dirección" required>
                        </div>                                                
                    </div>
                    
                    <div class="input-group">
                                               
                        <div class="form-line">
                            <input type="text" class="form-control" name="ruc" value="{{ $proveedor->ruc }}" placeholder="RUC" onkeypress="return valida(event)" maxlength="11" required>
                        </div>                        
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" value="{{ $proveedor->email }}" placeholder="Correo Electrónico" required>
                        </div>
                        <div class="form-line">
                            <input type="text" class="form-control" name="telefono" value="{{ $proveedor->telefono }}" placeholder="Teléfono" required>
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