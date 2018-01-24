<div class="modal fade in" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-crear">
	<form action="/producto-crear" method="POST" id="form-producto">	
		{{ csrf_field() }}	
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" 
					aria-label="Close">
	                     <span aria-hidden="true">×</span>
	                </button>
	                <h4 class="modal-title">Nuevo Producto</h4>
				</div>
				<div class="modal-body">
                    <div class="input-group">
                    	<label>Descripción</label>                                             
                        <div class="form-line">
                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción" required autofocus>
                        </div>                                               
                        <div class="row">
	                        <div class="col-md-4">
	                        	<label>Stock Máximo</label>                                             
				                <div class="form-line">
				                	<input type="number" id="stockMax" class="form-control" name="stockMax" placeholder="Stock máximo" required min="0">
				                </div>
	                        </div>
	                        <div class="col-md-4">
	                        	<label>Stock Mínimo</label>                                             
				                <div class="form-line">
				                        <input type="number" id="stockMin" class="form-control" name="stockMin" placeholder="Stock mínimo" min="0" required>
				                </div>
	                        </div>
	                        <div class="col-md-4">
	                        	<label>Unidad de medida</label>                                             
				                <div class="form-line">
				                    <select class="form-control" name="uniMed">
				                        <option value="unid">Unidades</option>
				                        <option value="cajas">Cajas</option>
				                        <option value="frascos">Frascos</option>                           	
				                        <option value="l">Litros</option>
				                        <option value="kg">Kilogramos</option>                           	
				                    </select>
				                </div>
	                        </div>
                        </div>	
                        <div class="row">
	                        <div class="col-md-6">
	                        	<label>Precio Compra</label>                                             
		                        <div class="form-line">
		                            <input type="number" step="any" id="precioCompra" class="form-control" name="precioCompra" placeholder="Precio de Compra" required>
		                        </div>
	                        </div>
	                        <div class="col-md-6">
	                        	<label>Precio Venta</label>                                             
		                        <div class="form-line">
		                            <input type="number" step="any" id="precioVenta" min="0" class="form-control" name="precioVenta" placeholder="Precio de Venta" required>
		                        </div>
	                        </div>
                        </div>             
                        
                        <!--<label>Fecha de vencimiento</label>                                             
                        <div class="form-line">
                            <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" placeholder="Fecha de vencimiento..." required>
                        </div> -->

                        <label>Componente genérico</label>                                             
                        <div class="form-line">
                            <input type="text" class="form-control" name="componente_generico" placeholder="Ingrese componente genérico">
                        </div>
						<div class="row">
							<div class="col-md-6">
		                        <label>Marca</label>                        
		                        <div class="form-line">
		                            <select class="form-control" name="id_marca">
		                                @foreach($marcas as $marca)
		                                    <option value="{{ $marca->id }}">{{ $marca->descripcion }}</option>
		                                @endforeach
		                            </select>
		                        </div>
	                        </div>
	                        <div class="col-md-6">
		                        <label>Categoría</label>                        
		                        <div class="form-line">
		                            <select class="form-control" name="id_linea">
		                                @foreach($lineas as $linea)
		                                    <option value="{{ $linea->id }}">{{ $linea->descripcion }}</option>
		                                @endforeach
		                            </select>
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
<script src="js/funciones/producto.js"></script>
<script type="text/javascript">
	$("#form-producto").validate({
		messages:{
                descripcion:"Por favor ingrese una descripción",
                stockMax:"Por favor ingrese stock másximo",
                stockMin:"Por favor ingrese stock mínimo",
                precioCompra:"Por favor ingrese precio de compra",
                precioVenta:"Por favor ingrese precio de venta"            
        }
	});
</script>
@endsection