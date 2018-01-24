<div class="modal fade in" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-crear">
	<form action="/linea-crear" method="POST" id="form-linea">	
		{{ csrf_field() }}	
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" 
					aria-label="Close">
	                     <span aria-hidden="true">×</span>
	                </button>
	                <h4 class="modal-title">Nueva Linea</h4>
				</div>
				<div class="modal-body">
                    <div class="input-group">
                    	<label>Descripción</label>                                             
                        <div class="form-line">
                            <input type="text" id="descripcion" class="form-control" name="descripcion" placeholder="Descripción" required autofocus>
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
	$("#form-linea").validate(
		{
			messages:{
				descripcion: "Debe ingresar descripción"
			}
		});
</script>
@endsection