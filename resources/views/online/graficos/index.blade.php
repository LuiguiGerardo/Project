@extends('online.layout.index')
@section('titulo')
<ol class="breadcrumb breadcrumb-bg-teal">
    <li><a href="/inicio"><i class="material-icons">home</i> Inicio</a></li>
    <li><a href="javascript:void(0);"><i class="material-icons">store</i> Gráficos</a></li> 
</ol>
@endsection
@section('contenido')
@include('online.partes.errores')
@include('online.partes.borrar-error')
@include('online.partes.notificaciones')
<div class="row clearfix">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="card">
                        <div class="header"> 
                            @if($año==null && $mes==null)
                                <h2>VENTAS {{ $fecha->year.'-'.$fecha->month }}</h2>
                            @else                         
                            <h2>VENTAS {{  $año.' - '.$mes }}</h2>  
                            @endif                          
                            <ul class="header-dropdown m-r--5">                                
                            </ul>                            
                        </div>
                        <div class="body">
                            <form action="" method="get">
                                                          
                                <div class="input-group"> 
                                    <div class="col-md-4">
                                       <div class="form-line">
                                        <select class="form-control" id="mes" name="mes" required id="tipo_doc">
                                            <option value="1">Enero</option>
                                            <option value="2">Febrero</option>
                                            <option value="3">Marzo</option>
                                            <option value="4">Abril</option>
                                            <option value="5">Mayo</option>
                                            <option value="6">Junio</option>
                                            <option value="7">Julio</option>
                                            <option value="8">Agosto</option>
                                            <option value="9">Setiembre</option>
                                            <option value="10">Octubre</option>
                                            <option value="11">Noviembre</option>
                                            <option value="12">Diciembre</option>
                                        </select>
                                        </div> 
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-line">
                                        <select class="form-control" id="mes" name="anio" required id="tipo_doc">
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>                                            
                                        </select>
                                        </div> 
                                    </div>                                                                    
                                    <div class="col-md-4">
                                        <button type="submit" class="btn bg-teal btn-lg waves-effect pull-right">Consultar</button>
                                    </div>
                                    
                                </div>                            
                            </form> 

                            @if(count($datos)>0)
                            <div id="donut-example"></div>
                            @else
                            <hr>
                            <h3 align="center">NO HAY DATA EXISTENTE</h3>
                            <hr>
                            @endif
                        </div>
                    </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="card">
                        <div class="header"> 
                            @if($año==null && $mes==null)
                                <h2>VENTAS-TRABAJADOR {{ $fecha->year.'-'.$fecha->month }}</h2>
                            @else                         
                            <h2>VENTAS-TRABAJADOR {{  $mes.' - '.$año }}</h2>  
                            @endif                          
                            <ul class="header-dropdown m-r--5">                                
                            </ul>                            
                        </div>
                        <div class="body">                            

                            @if(count($trabajadores)>0)
                            <div id="donut-trabajador"></div>
                            @else
                            <hr>
                            <h3 align="center">NO HAY DATA EXISTENTE</h3>
                            <hr>
                            @endif
                        </div>
                    </div>
    </div>     
</div>

@endsection
@section('scripts')

<script type="text/javascript">
        var text= "{{ $datos }}";
        var text=text.replace(/&quot;/g, '"');
        var json=JSON.parse(text);
        var datos='';
        for(var i=0;i<json.length;i++)
        { 
           // console.log(json[i].descripcion);
           // console.log(json[i].cantidad);
            datos+='{label: "'+json[i].descripcion+'", value: '+json[i].cantidad+'},';
        }
        

        Morris.Donut({            
          element: 'donut-example',
          data: [
                @foreach($datos as $dat)
                {label: "{{ $dat->descripcion }}",value:{{ $dat->cantidad }} },
                @endforeach
          ],
          colors:[
                @foreach($datos as $dat)
                    @if($dat->cantidad>20)
                        '#04B404',      
                    @elseif($dat->cantidad<=20 && $dat->cantidad>=10)
                        '#FFFF00',
                    @else
                        '#FF0000',
                    @endif
                @endforeach
          ]
          
        });

        Morris.Donut({            
          element: 'donut-trabajador',
          data: [
                @foreach($trabajadores as $trabajador)
                {label: "{{ $trabajador->nombre_completo }}",value:{{ $trabajador->n_ventas }} },
                @endforeach
          ],
          colors:[
                @foreach($trabajadores as $trabajador)
                    @if($trabajador->n_ventas<3)
                        '#FF0000',
                    @else
                        '#04B404',
                    @endif
                @endforeach
          ]
          
        });
                  
</script>
@endsection
