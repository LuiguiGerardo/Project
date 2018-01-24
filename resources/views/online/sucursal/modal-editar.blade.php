<div class="modal fade in" aria-hidden="true" role="dialog" tabindex="-1" id="modal-editar-{{ $sucursal->id }}">
	<form action="/sucursal-editar/{{ $sucursal->id }}" method="POST">	
		{{ csrf_field() }}	
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" 
					aria-label="Close">
	                     <span aria-hidden="true">×</span>
	                </button>
	                <h4 class="modal-title">Editar Sucursal</h4>
				</div>
				<div class="modal-body">
                    <div class="input-group">
                        {!! Form::label('id_ciudad','Ciudad')!!}
                        <div class="form-line">
                           {!! Form::select('id_ciudad',$ciudades,$sucursal->ciudad->id,['class'=>'form-control','required'])!!}
                        </div>                        
                    </div>
                 	
                 	<div class="input-group">
                        {!! Form::label('direccion','Dirección')!!}
                        <div class="form-line">
                            {!! Form::text('direccion', $sucursal->direccion, ['class'=>'form-control','placeholder'=>'Dirección'])!!}
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