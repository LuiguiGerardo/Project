<div class="modal fade in" aria-hidden="true" role="dialog" tabindex="-1" id="modal-ver-{{ $compra->id }}">	
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">×</span>
	        </button>
	          <h4 class="modal-title">Compra {{ $compra->id }}</h4>
				</div>
				<div class="modal-body">
          <div class="row">
            <div class="input-group">

              <div class="col-md-6">
                <label>Proveedor</label>                        
	                <div class="form-line">
	                  <input type="text" disabled value="{{ $compra->proveedor->razon_social }}" class="form-control">
	                </div>
              </div>
                        
  						<div class="col-md-3">
  							<label>Tipo Documento</label>                        
  	              <div class="form-line">
  	                @if($compra->tipo_doc=="F")
                      <input type="text" disabled value="Factura" class="form-control">
                    @else
                      <input type="text" disabled value="Boleta" class="form-control">
                    @endif
  	              </div>  
  						</div>
              <div class="col-md-3">
                <label>N° Documento</label>                        
                  <div class="form-line">
                      <input type="text" disabled value="{{ $compra->n_documento }}" class="form-control">                    
                  </div>  
              </div>                      
            </div>                               
				  </div>
          <div class="col-md-12">
            <div class="panel panel-primary">
              <div class="panel-body">
                <div class="input-group" style="background-color:#01DFA5;">
                  <div class="col-md-3">
                    <label>PRODUCTO</label> 
                  </div>
                  <div class="col-md-3">
                    <label>CANTIDAD</label>
                  </div>
                  <div class="col-md-3">
                    <label>PRECIO COMPRA</label> 
                  </div>
                  <div class="col-md-3">
                    <label>SUBTOTAL</label>
                  </div>                  
                </div>
                @foreach($compra->detalles as $detalle)
                
                <div class="input-group"> 
                  <div class="col-md-3">
                                           
                    <div class="form-line">
                      <input type="text" disabled class="form-control" value="{{ $detalle->producto->descripcion }}">
                    </div>
                  </div>
                  <div class="col-md-3">
                                            
                    <div class="form-line">
                      <input type="text" disabled class="form-control" value="{{ $detalle->cantidad }}">
                    </div>
                  </div>
                  <div class="col-md-3">
                                           
                    <div class="form-line">
                      <input type="text" disabled class="form-control" value="{{ $detalle->producto->precioCompra }}">
                    </div>
                  </div>                  
                  <div class="col-md-3">
                                            
                    <div class="form-line">
                      <input type="text" disabled class="form-control" value="{{ $detalle->producto->precioCompra*$detalle->cantidad }}">
                    </div>
                  </div>
                </div>
                @endforeach
                <div class="col-md-12">
                  <div class="col-md-3 pull-left">
                    <div class="input-group" style="background-color:#01DFA5;">
                      <label>TOTAL</label> 
                    </div>
                  </div>                   
                  <div class="col-md-3 pull-right">
                    <div class="input-group">                                            
                        <div class="form-line">
                          <input type="text" disabled class="form-control" value="{{ $compra->total }}">
                        </div>
                    </div>
                  </div>                             
                </div>              
              </div>  
            </div>
          </div>
          
        </div>
        
				<div class="modal-footer">
					 <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>					
				</div>
			</div>
		</div>	
</div>
