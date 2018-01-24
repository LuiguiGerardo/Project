<div class="modal fade in" aria-hidden="true" role="dialog" tabindex="-1" id="modal-crear">
	<form action="/cliente-crear" method="POST" id="form-cliente">	
		{{ csrf_field() }}	
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" 
					aria-label="Close">
	                     <span aria-hidden="true">×</span>
	                </button>
	                <h4 class="modal-title">Nuevo Cliente</h4>
				</div>
				<div class="modal-body">
                    <div class="input-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Nombres</label>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombres" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Apellidos</label>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="apellidos" id="apellido" placeholder="Apellidos" required>
                                </div>  
                            </div>
                        </div>                                       
                    </div>                    
                    
                    <div class="input-group"> 
                        <div class="row">
                            <div class="col-md-8">
                                <label>Dirección</label>
                                <div class="form-line">
                                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>Género</label>                        
                                <div class="form-line">
                                     <select class="form-control" name="sexo" id="sexo" required>
                                            <option value="H">Hombre</option>
                                            <option value="M">Mujer</option>                                
                                    </select>  
                                </div>
                            </div>
                        </div>                  
                    </div>                    

                    <div class="input-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Tipo Documento</label>                        
                                <div class="form-line">
                                     <select class="form-control" name="tipo_doc" id="tipo_doc" required>
                                            <option value="D">DNI</option>
                                            <option value="R">RUC</option>                                
                                    </select>  
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Documento</label>
                                <div class="form-line">
                                    <input type="text" class="form-control" name="documento" id="documento" placeholder="Ingrese documento" onkeypress="return valida(event)" maxlength="11" required>
                                </div>                                                              
                            </div>
                        </div>
                                                
                    </div>
                 	
                    <div class="input-group">
                        <div class="row">
                            <div class="col-md-6">
                               <label>Email</label>    
                                <div class="form-line">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="ejemplo@ejemplo.com" required>
                                </div>   
                            </div>
                            <div class="col-md-6">
                                <label>Fecha de nacimiento</label>
                                <div class="form-line">
                                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha de nacimiento" required>
                                </div>
                            </div>
                        </div>                   
                    </div> 
                    <div class="input-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Celular</label>
                                 <div class="form-line">
                                    <input type="text" class="form-control" id="celular" name="celular" placeholder="Celular" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Teléfono</label>
                                 <div class="form-line">
                                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" required>
                                </div>
                            </div>                            
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