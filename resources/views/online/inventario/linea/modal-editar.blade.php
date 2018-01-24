<div class="modal fade in" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-editar-{{ $linea->id }}">
	<form action="/linea-editar/{{ $linea->id }}" method="POST">	
		{{ csrf_field() }}	
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" 
					aria-label="Close">
	                     <span aria-hidden="true">×</span>
	                </button>
	                <h4 class="modal-title">Editar Linea</h4>
				</div>
				<div class="modal-body">
                    <div class="input-group">
                    	<label>Descripción</label>                                             
                        <div class="form-line">
                            <input type="text" class="form-control" name="descripcion" value="{{ $linea->descripcion }}" placeholder="Descripción" required>
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