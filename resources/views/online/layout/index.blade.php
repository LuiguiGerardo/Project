<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>FarmEDTL</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Colorpicker Css -->
    <link href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="plugins/dropzone/dropzone.css" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Sweetalert Css -->
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="plugins/nouislider/nouislider.min.css" rel="stylesheet" />
    <!-- Morris Chart Css-->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Cargando...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="Escribe algo...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="#"><b>FarmEDTL</b></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>                   
                    
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->personal->nombre.' '.Auth::user()->personal->apellido }}</div>
                    <div class="email">{{ Auth::user()->email }}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="{{ route('logout') }}" 
                                onclick="event.preventDefault();                                                     document.getElementById('logout-form').submit();"><i class="material-icons">input</i>Cerrar Sesión</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                </form>
                            </li>
                           <!-- <li role="seperator" class="divider"></li> -->
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">BARRA DE NAVEGACIÓN</li>
                    <li class="active">
                        <a href="/inicio">
                            <i class="material-icons">home</i>
                            <span>Inicio</span>
                        </a>
                    </li>
                    @if(Auth::user()->personal->cargo->descripcion=='Admin')     
                    <li>
                        <a href="/sucursal">
                            <i class="material-icons">store</i>
                            <span>Sucursales</span>
                        </a>                        
                    </li>
                    @endif
                     @if(Auth::user()->personal->cargo->descripcion=='Admin')
                    <li>
                        <a href="#" class="menu-toggle">
                            <i class="material-icons">contacts</i>
                            <span>Personal</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="/personal">
                                    <span>Administrar Trabajadores</span>
                                </a>                                
                            </li>
                            <li>
                                <a href="/user">
                                    <span>Administrar Usuarios</span>
                                </a>                                
                            </li>
                        </ul>
                    </li>
                     @endif        
                    <li>
                        <a href="#" class="menu-toggle">
                            <i class="material-icons">swap_calls</i>
                            <span>Inventario</span>
                        </a>
                        <ul class="ml-menu">
                            @if(Auth::user()->personal->cargo->descripcion=='Admin')                            
                            <li>
                                <a href="/linea">Lineas</a>
                            </li>
                            <li>
                                <a href="/marca">Marcas</a>
                            </li>
                             @endif 
                            <li>
                                <a href="/producto">Productos</a>
                            </li>                                                      
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <i class="material-icons">shopping_cart</i>
                            <span>Compras</span>
                        </a>
                        <ul class="ml-menu">
                            @if(Auth::user()->personal->cargo->descripcion=='Admin')
                            <li>
                                <a href="/compra">Compras</a>
                            </li>                             
                            <li>
                                <a href="/proveedor">Proveedores</a>                                
                            </li>
                            @endif 
                        </ul>
                    </li>  
                    <li>
                        <a href="#" class="menu-toggle">
                            <i class="material-icons">payment</i>
                            <span>Ventas</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="/cliente">
                                    <span>Clientes</span>
                                </a>                                
                            </li>
                            <li>
                                <a href="/venta">
                                    <span>Ventas Registradas</span>
                                </a>                                
                            </li>
                        </ul>
                    </li>                    
                    @if(Auth::user()->personal->cargo->descripcion=='Admin')                  
                    <li>
                        <a href="#" class="menu-toggle">
                            <i class="material-icons">pie_chart</i>
                            <span>Graficos</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="/grafico">Ventas</a>
                            </li>                                                                       
                        </ul>
                    </li>
                    <li>
                        <a href="/reporte">
                            <i class="material-icons">content_copy</i>
                            <span>Reportes</span>
                        </a>                        
                    </li> 
                    @endif                   
                                     
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2017 <a href="javascript:void(0);">FarmEDTL</a>.
                </div>                
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->        
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>@yield('titulo')</h2>
            </div>
            
            @yield('contenido')
            <!-- #END# Widgets -->
            <!-- CPU Usage -->
            
            
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>
    
    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>
    
    <!-- Bootstrap Colorpicker Js -->
    <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>

    <!-- Dropzone Plugin Js -->
    <script src="plugins/dropzone/dropzone.js"></script>

    <!-- Input Mask Plugin Js -->
    <script src="plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
    
    
    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!-- noUISlider Plugin Js -->
    <script src="../../plugins/nouislider/nouislider.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="plugins/chartjs/Chart.bundle.js"></script>    

    <!-- Sparkline Chart Plugin Js -->
    <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>

    <!-- SweetAlert Plugin Js -->
    <script src="plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
    @yield('scripts')
</body>

</html>
