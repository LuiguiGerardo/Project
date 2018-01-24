<div class="modal fade in" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-editar-{{ $producto->id }}">
	<form action="/producto-editar/{{ $producto->id }}" method="POST" id="form-producto">	
		{{ csrf_field() }}	
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" 
					aria-label="Close">
	                     <span aria-hidden="true">×</span>
	                </button>
	                <h4 class="modal-title">Editar Producto</h4>
				</div>
				<div class="modal-body">
                    <div class="input-group">
                    	<label>Descripción</label>                                             
                        <div class="form-line">
                            <input type="text" class="form-control" name="descripcion" placeholder="Descripción" required autofocus value="{{ $producto->descripcion }}">
                        </div>                                               
                        <div class="row">
	                        <div class="col-md-4">
	                        	<label>Stock Máximo</label>                                             
				                <div class="form-line">
				                	<input type="number" id="stockMax" class="form-control" name="stockMax" placeholder="Stock máximo" required min="0" value="{{ $producto->stockMax }}">
				                </div>
	                        </div>
	                        <div class="col-md-4">
	                        	<label>Stock Mínimo</label>                                             
				                <div class="form-line">
				                        <input type="number" id="stockMin" class="form-control" name="stockMin" placeholder="Stock mínimo" min="0" value="{{ $producto->stockMin }}" required>
				                </div>
	                        </div>
	                        <div class="col-md-4">
	                        	<label>Unidad de medida</label>                                             
				                <div class="form-line">
				                    <select class="form-control" name="uniMed">
				                    	@if($producto->uniMed=="unid")
				                        <option value="unid" selected>Unidades</option>
				                        <option value="cajas">Cajas</option>
				                        @else
										<option value="unid">Unidades</option>
				                        <option value="cajas" selected>Cajas</option>
				                        @endif                         	
				                    </select>
				                </div>
	                        </div>
                        </div>	
                        <div class="row">
	                        <div class="col-md-6">
	                        	<label>Precio Compra</label>                                             
		                        <div class="form-line">
		                            <input type="number" step="any" id="precioCompra" class="form-control" name="precioCompra" placeholder="Precio de Compra" value="{{ $producto->precioCompra }}" required>
		                        </div>
	                        </div>
	                        <div class="col-md-6">
	                        	<label>Precio Venta</label>                                             
		                        <div class="form-line">
		                            <input type="number" step="any" id="precioVenta" min="0" class="form-control" name="precioVenta" placeholder="Precio de Venta" value="{{ $producto->precioVenta }}" required>
		                        </div>
	                        </div>
                        </div>             
                        
                        <!--<label>Fecha de vencimiento</label>                                             
                        <div class="form-line">
                            <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" placeholder="Fecha de vencimiento..." required>
                        </div> -->

                        <label>Componente genérico</label>                                             
                        <div class="form-line">
                            <input type="text" class="form-control" name="componente_generico" placeholder="Ingrese componente genérico" value="{{ $producto->componente_generico }}">
                        </div>
						<div class="row">
							<div class="col-md-6">
		                        <label>Marca</label>                        
		                        <div class="form-line">
		                            <select class="form-control" name="id_marca">
		                                @foreach($marcas as $marca)
		                                	@if($producto->id_marca==$marca->id)
		                                	<option value="{{ $marca->id }}" selected>{{ $marca->descripcion }}</option>
		                                	@else
		                                    <option value="{{ $marca->id }}">{{ $marca->descripcion }}</option>
		                                    @endif
		                                @endforeach
		                            </select>
		                        </div>
	                        </div>
	                        <div class="col-md-6">
		                        <label>Categoría</label>                        
		                        <div class="form-line">
		                            <select class="form-control" name="id_linea">
		                                @foreach($lineas as $linea)
		                                	@if($producto->id_linea==$linea->id)
		                                	<option value="{{ $linea->id }}" selected>{{ $linea->descripcion }}</option>
		                                	@else
		                                    <option value="{{ $linea->id }}">{{ $linea->descripcion }}</option>
		                                    @endif
		                                @endforeach
		                            </select>
		                        </div>
	                        </div>
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
@section('scripts')
<script src="js/funciones/producto.js"></script>
@endsection