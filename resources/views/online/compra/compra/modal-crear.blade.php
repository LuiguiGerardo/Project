<div class="modal fade in" aria-hidden="true" role="dialog" tabindex="-1" id="modal-crear">
	<form action="/compra-crear" method="POST" id="form-crear">	
		{{ csrf_field() }}	
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" 
					aria-label="Close">
	                     <span aria-hidden="true">×</span>
	                </button>
	                <h4 class="modal-title">Nueva Compra</h4>
				</div>
				<div class="modal-body">
                    <div class="input-group">

                    	<div class="col-md-6">
                    		<label>Proveedor</label>                        
	                        <div class="form-line">
	                            <select class="form-control" name="id_proveedor" id="id_proveedor">
	                            	<option value="">Seleccione un proveedor</option>
	                                @foreach($proveedores as $proveedor)
	                                    <option value="{{ $proveedor->id }}">{{ $proveedor->razon_social }}</option>
	                                @endforeach
	                            </select>
	                        </div>
                    	</div>
                        <input type="hidden" name="id_personal" value="{{ auth()->user()->personal->id }}">
          						<div class="col-md-3">
          							<label>Tipo Documento</label>                        
          	                        <div class="form-line">
          	                            <select class="form-control" name="tipo_doc" required id="tipo_doc">
          	                                <option value="F">Factura</option>
          	                                <option value="B">Boleta</option>
          	                            </select>
          	                        </div>  
          						</div>
                      <div class="col-md-3">
                        <label>N° Documento</label>                        
                                    <div class="form-line">
                                        <input type="text" name="n_documento" maxlength="11" placeholder="N° Documento" class="form-control" required>
                                    </div>  
                      </div>                      
                    </div>
                    <div class="panel panel-primary">
                      <div class="panel-body">
                        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                          <div class="input-group">  
                            <label>Producto</label>                        
                              <div class="form-line">
                                  <select name="pidproducto" class="form-control"  id="pidproducto" data-live-search="true">
                                      
                                  </select>
                              </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                          <div class="input-group">          
                            <label>Cantidad</label>                                             
      		              <div class="form-line">
      		                <input type="number" step="any" min="0" id="pcantidad" class="form-control" placeholder="Cantidad">
      		              </div>                      
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                          <div class="input-group">
                            <label>Precio Compra</label>                                             
      		              <div class="form-line">
      		                <input type="number" disabled step="any" id="pprecio_compra" class="form-control" name="pprecio_compra" placeholder="Precio de Compra" required>
      		              </div>
                          </div>
                        </div>
                        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                          <div class="input-group">
                            <label>Precio Venta</label>                                             
      		              <div class="form-line">
      		                <input type="number" disabled step="any" id="pprecio_venta" min="0" class="form-control" name="pprecio_venta" placeholder="Precio de Venta" required>
      		              </div>
                          </div>
                        </div>
                       <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                          <div class="input-group">                    
                           <button  type="button" id="bt_add" class="btn btn-success pull-right">Agregar</button>
                          </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <br>
                          <table id="detalles" class="table table-bordered table bordered table condensed table-hover">
                            <thead style="background-color:#58C658"> 
                              <th>Opciones</th>
                              <th>Producto</th>
                              <th>Cantidad</th>
                              <th>Precio Compra</th>
                              <th>Precio Venta</th>
                              <th>Subtotal</th>
                            </thead>
                            <tbody id="detalles_body"></tbody>
                            <tfoot>
                              <th>TOTAL</th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th><h4 id="total">S/.0.00</h4><input type="hidden" name="total" id="total_compra"></th>

                            </tfoot>                      
                          </table>
                        </div>
                      </div>
                    </div>                   
                                                           
				</div>
				<div class="modal-footer" id="guardar">
					<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-link waves-effect">Guardar</button>
				</div>
			</div>
		</div>
	</form>
</div>
@section('scripts')
<script type="text/javascript">
	
	function onIdProveedorChange(){
     $("#detalles_body").html("");
    total=0;
    subtotal=[];
    $("#total_compra").val(total);
    $("#total").html("");

		var proveedor_id=$(this).val();
		//AJAX
		if(!proveedor_id)
			{
				$('#pidproducto').html('');
				$("#pprecio_compra").val("");
				$("#pprecio_venta").val("");
				return; //para que no haga peticion en vano
			}

		$.get('/compra-proveedor/'+proveedor_id+'/producto', function(data){
			var html_select='';
			for (var i = 0; i<data.length; i++) {
				html_select+='<option value="'+data[i].id+'_'+data[i].precioCompra+'_'+data[i].precioVenta+'">'+data[i].descripcion+'</option>';								
			}
			$('#pidproducto').html(html_select);
			mostrarValores();

		});
		
	}
	$(document).ready(function()
    {
      $('#id_proveedor').on('change',onIdProveedorChange); 
      $("#bt_add").click(function(){
        agregar();
      });

    });
    var cont=0;
    total=0;
    subtotal=[];
    $("#guardar").hide();
    /*$(document).on('ready',function(){
    //$('select[name=pidproducto]').val(1);
    //$('.selectpicker').selectpicker('refresh')
    
    });*/
    $("#pidproducto").change(mostrarValores);

    function mostrarValores() {
      datosProducto=document.getElementById('pidproducto').value.split('_');
      
      $("#pprecio_compra").val(datosProducto[1]);     
      $("#pprecio_venta").val(datosProducto[2]);

    }

    function agregar()
    {
      datosProducto=document.getElementById('pidproducto').value.split('_');	
      idproducto=datosProducto[0];
      producto=$("#pidproducto option:selected").text();
      cantidad=$("#pcantidad").val();
      precio_compra=$("#pprecio_compra").val();
      precio_venta=$("#pprecio_venta").val();
      var factor=10;

      if(idproducto!="" && cantidad!="" && cantidad>0 /*&& precio_compra!="" && precio_venta!=""*/)
      {
          subtotal[cont]=((cantidad*factor)*(precio_compra*factor))/(factor*factor);
          total=total+subtotal[cont];
          var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger" onclick="eliminar('+cont+')">X</button></td><td><input type="hidden" name="id_producto[]" value="'+idproducto+'">'+producto+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precio_compra[]" disabled value="'+precio_compra+'"></td><td><input type="number" name="precio_venta[]" disabled value="'+precio_venta+'"></td><td>'+subtotal[cont]+'</td></tr>';
          cont++;
          limpiar();
          $("#total").html("S/. "+total);
          $("#total_compra").val(total);
          evaluar();
          $("#detalles_body").append(fila);
      }
      else
      {
        //alert("Error al ingresar el detalle del ingreso, revise los datos del articulo");
        	swal({
			  title: "Error",
			  text: "Error al ingresar el detalle de la compra, revise los datos del producto",
			  icon: "warning",
			  dangerMode: true,
			});
      }
    }

    function limpiar(){
      $("#pcantidad").val("");
      //$("#pprecio_compra").val("");
      //$("#pprecio_venta").val("");
    }

    function evaluar()
    {
      if(total>0)
      {
        $("#guardar").show();
      }
      else
      {
        $("#guardar").hide();
      }
    }
    function eliminar(index)
    {
      total=total-subtotal[index];
      $("#total").html("S/. "+total);
      $("#fila" + index).remove();
      evaluar();
    }
	$("#form-linea").validate(
		{
			messages:{
				id_proveedor: "Debe seleccionar proveedor"
			}
		});

</script>
@endsection