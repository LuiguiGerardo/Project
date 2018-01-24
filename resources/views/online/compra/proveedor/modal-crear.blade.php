<div class="modal fade in" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-crear">
	<form action="/proveedor-crear" method="POST" id="form-proveedor">	
		{{ csrf_field() }}	
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" 
					aria-label="Close">
	                     <span aria-hidden="true">×</span>
	                </button>
	                <h4 class="modal-title">Nuevo Proveedor</h4>
				</div>
				<div class="modal-body">
                    <div class="input-group">                                             
                        <div class="form-line">
                            <input type="text" id="razon_social" class="form-control" name="razon_social" placeholder="Razón Social" required>
                        </div>
                        
                        <div class="form-line">
                            <input type="text" id="direccion" class="form-control" name="direccion" placeholder="Dirección" required>
                        </div>                                                
                    </div>
                    
                    <div class="input-group">
                                               
                        <div class="form-line">
                            <input type="text" id="ruc" class="form-control" name="ruc" placeholder="RUC" onkeypress="return valida(event)" maxlength="11" minlength="11" required>
                        </div>                        
                        <div class="form-line">
                            <input type="email" id="email" class="form-control" name="email" placeholder="Correo Electrónico" required>
                        </div>
                        <div class="form-line">
                            <input type="text" id="telefono" class="form-control" name="telefono" placeholder="Teléfono" required>
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
		$("#form-proveedor").validate({
			messages: {
				razon_social: "Ingresar razón social",
				direccion: "Ingresar direccion",
				ruc: "Ingresar RUC válido",
				email: "Ingresar email"
			}
		});
		$('#ruc').on('keypress', function (e) {
	    console.log(e.keyCode);
	    if (e.keyCode == 101 || e.keyCode == 45 || e.keyCode == 46 || e.keyCode == 43 || e.keyCode == 44 || e.keyCode == 47) {
	        return false;
	    }
	    soloNumeros(e.keyCode);
	    function soloNumeros(e) {
		    var key = window.Event ? e.which : e.keyCode
		        return (key >= 48 && key <= 57)
		}
	});
	</script>
@endsection