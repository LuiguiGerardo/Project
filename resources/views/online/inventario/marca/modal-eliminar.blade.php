<div class="modal fade in" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-eliminar-{{ $marca->id }}">
	<form action="/marca-eliminar/{{ $marca->id }}" method="GET">	
		{{ csrf_field() }}	
		<div class="modal-dialog">
			<div class="modal-content modal-col-red">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" 
					aria-label="Close">
	                     <span aria-hidden="true">×</span>
	                </button>
	                <h4 class="modal-title">Eliminar marca</h4>
				</div>
				<div class="modal-body">
                    <h3><b>¿Seguro que desea eliminar esta marca?</b></h3>  
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-link waves-effect">Eliminar</button>
				</div>
			</div>
		</div>
	</form>
</div>