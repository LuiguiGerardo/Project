<div class="modal fade in" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-crear">
	<form action="/sucursal-crear" method="POST" id="form-sucursal">	
		{{ csrf_field() }}	
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" 
					aria-label="Close">
	                     <span aria-hidden="true">×</span>
	                </button>
	                <h4 class="modal-title">Nueva Sucursal</h4>
				</div>
				<div class="modal-body">
                    
                 	<div class="input-group">                        
                        {!! Form::label('id_ciudad','Ciudad')!!}
                        <div class="form-line">                            
                            {!! Form::select('id_ciudad',$ciudades,null,['class'=>'form-control','required'])!!}
                        </div>                        
                    </div>
                 	<div class="input-group">
                        {!! Form::label('direccion','Dirección')!!}
                        <div class="form-line">
                            {!! Form::text('direccion', null, ['class'=>'form-control','placeholder'=>'Dirección','required','id'=>'direccion'])!!}
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
	$("#form-sucursal").validate({
		messages:{
                direccion:"Por favor ingrese una direccion"              
        }
	});
</script>
@endsection