@extends('online.layout.index')
@section('titulo')
<ol class="breadcrumb breadcrumb-bg-teal">
    <li><a href="/inicio"><i class="material-icons">home</i> Inicio</a></li>
</ol>
@endsection

@section('contenido')
    @include('online.partes.borrar-error')
    <div class="row clearfix">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="header bg-cyan">
                            <div class="row clearfix">
                                <div>
                                    <h2 align="center">MISIÓN</h2>
                                </div>
                                <div class="col-xs-6 col-sm-6 align-right">
                                   
                                </div>
                            </div>                            
                        </div>
                        <div class="body">
                            <div class="form-line focused">
                                <p align="justify">
                                    <b>
                                    "Somos una empresa que ofrece productos farmacéuticos de calidad,  encargados de llevar salud, ahorro y buena atención a todos nuestros clientes."
                                    </b>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="header bg-green">
                            <div class="row clearfix">
                                <div>
                                    <h2 align="center">VISIÓN</h2>
                                </div>
                                <div class="col-xs-6 col-sm-6 align-right">
                                   
                                </div>
                            </div>                            
                        </div>
                        <div class="body">
                            <div class="form-line focused">
                                <p align="justify">
                                    <b>
                                    "En el 2022 ser una empresa líder en distribución farmacéutica, con presencia a nivel nacional siendo reconocida por trabajar con responsabilidad y brindar el mejor producto para la salud y bienestar de nuestros clientes."
                                    </b>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">store</i>
                        </div>
                        <div class="content">
                            <div class="text">SUCURSALES</div>
                            <div class="number" data-from="0" data-to="{{ $sucursales }}" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <div class="content">
                            <div class="text">PRODUCTOS</div>
                            <div class="number" data-from="0" data-to="{{ $productos }}" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">local_shipping</i>
                        </div>
                        <div class="content">
                            <div class="text">PROVEEDORES</div>
                            <div class="number" data-from="0" data-to="{{ $proveedores }}" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">USUARIOS</div>
                            <div class="number" data-from="0" data-to="{{ $users }}" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-purple hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">person_pin</i>
                        </div>
                        <div class="content">
                            <div class="text">PERSONAL</div>
                            <div class="number" data-from="0" data-to="{{ $personals }}" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-lime hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">shopping_cart</i>
                        </div>
                        <div class="content">
                            <div class="text">COMPRAS</div>
                            <div class="number" data-from="0" data-to="{{ $compras }}" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-teal hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">payment</i>
                        </div>
                        <div class="content">
                            <div class="text">VENTAS</div>
                            <div class="number" data-from="0" data-to="{{ $ventas }}" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-red">
                            <h2>
                                Trabajador del mes <small>{{ $fecha->year.'-'.$fecha->month }}</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">                                        
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            {{ $trabajadorAño->nombre_completo }}: {{ $trabajadorAño->n_ventas }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue">
                            <h2>
                                Producto más vendido <small>{{ $fecha->year.'-'.$fecha->month }}</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">                                        
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            {{ $productoAño->descripcion }}: {{ $productoAño->cantidad }}
                        </div>
                    </div>
                </div>
            </div>
@endsection
@section('scripts')
<script>
     $('.number').countTo();
</script>
@endsection