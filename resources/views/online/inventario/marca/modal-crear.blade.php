<div class="modal fade in" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-crear">
	<form action="/marca-crear" method="POST" id="form-marca">	
		{{ csrf_field() }}	
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" 
					aria-label="Close">
	                     <span aria-hidden="true">×</span>
	                </button>
	                <h4 class="modal-title">Nueva Marca</h4>
				</div>
				<div class="modal-body">
                    <div class="input-group">
                    	<label>Descripción</label>                                             
                        <div class="form-line">
                            <input type="text" id="descripcion" class="form-control" name="descripcion" placeholder="Descripción" required autofocus>
                        </div>
                        <label>Proveedor</label>                        
                        <div class="form-line">
                            <select class="form-control" name="id_proveedor">
                                @foreach($proveedores as $proveedor)
                                    <option value="{{ $proveedor->id }}">{{ $proveedor->razon_social }}</option>
                                @endforeach
                            </select>
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
	$("#form-marca").validate({
		messages:{
			descripcion: "Debe ingresar descripción"
		}
	});
</script>
@endsection