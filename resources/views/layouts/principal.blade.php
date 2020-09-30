<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Activos Fijos</title>

        <!-- ================= Favicon ================== -->
        <!-- Standard -->
        <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
        <!-- Retina iPad Touch Icon-->
        <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
        <!-- Retina iPhone Touch Icon-->
        <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
        <!-- Standard iPad Touch Icon-->
        <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
        <!-- Standard iPhone Touch Icon-->
        <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

        <!-- Styles -->
        <link href="{{asset('assets/css/lib/weather-icons.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/css/lib/owl.carousel.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/css/lib/owl.theme.default.min.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/css/lib/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/lib/themify-icons.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/lib/menubar/sidebar.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/lib/bootstrap.min.css')}}" rel="stylesheet">

        <link href="{{asset('assets/css/lib/helper.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    </head>

    <body>

        <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
            <div class="nano">
                <div class="nano-content">
                    <div class="logo"><a href="/home"><!-- <img src="assets/images/logo.png" alt="" /> --><span>Activos Fijos</span></a></div>
                    <ul>
                        <li class="label">Menu</li>
                        @can('read bien')
                        <li>
                          <a class="sidebar-sub-toggle"><i class="ti-home"></i>Gestionar Activo Fijo<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="{{URL::action('BienController@index')}}"><i class="fa fa-plus-square-o"></i>Registro Bien</a></li>
                                <li><a href="{{URL::action('DepreciacionController@index')}}"><i class="fa fa-arrow-circle-down"></i>Depreciacion</a></li>
                            </ul>
                        </li>
                        @endcan

                        <li><a class="sidebar-sub-toggle"><i class="fa fa-user"></i>Gestionar Empleado<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                              @can('read custodio')
                                  <li><a href="{{URL::action('CustodioController@index')}}"><i class="fa fa-user-plus" aria-hidden="true"></i> Custodio </a></li>

                              @endcan

                              @can('read responsable')
                                  <li><a href="{{URL::action('ResponsableController@index')}}"><i class="fa fa-user-plus" aria-hidden="true"></i> Responsable </a></li>
                              @endcan

                              @can('read operador')
                                  <li><a href="{{URL::action('OperadorController@index')}}"><i class="fa fa-user-plus" aria-hidden="true"></i> Operador </a></li>
                              @endcan

                              @can('read proveedor')
                                  <li><a href="{{URL::action('ProveedorController@index')}}"><i class="fa fa-user-plus" aria-hidden="true"></i> Proveedor </a></li>
                              @endcan
                            </ul>
                        </li>



                        <li><a class="sidebar-sub-toggle"><i class="fa fa-refresh"></i>Mantenimiento<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                              @can('read transferencia')
                                  <li><a href="{{URL::action('TranferenciaController@index')}}"><i class="fa fa-recycle"></i> Transferencia</a></li>
                              @endcan

                              @can('read mantenimiento')
                                  <li><a href="{{URL::action('MantenimientoController@index')}}"><i class="fa fa-wrench"></i> Mantenimiento</a></li>
                              @endcan

                              @can('read baja')
                                  <li><a href="{{URL::action('BajaController@index')}}"><i class="fa fa-wrench"></i> Baja</a></li>
                              @endcan

                              @can('read revaluo')
                                  <li><a href="{{URL::action('RevaluoController@index')}}"><i class="fa fa-wrench"></i> Revaluo</a></li>
                              @endcan

                              @can('read revision')
                                  <li><a href="{{URL::action('RevisionController@index')}}"><i class="fa fa-folder"></i> Revision Tecnica</a></li>
                              @endcan
                            </ul>
                        </li>



                        <li><a class="sidebar-sub-toggle"><i class="fa fa-globe"></i>Gestionar Ubicacion<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                              @can('read ubicacion')
                                  <li><a href="{{URL::action('UbicacionController@index')}}"><i class="fa fa-map-marker"></i> Ubicacion</a></li>
                              @endcan

                              @can('read departamento')
                                  <li><a href="{{URL::action('DepartamentoController@index')}}"><i class="fa fa-street-view"></i> Departamento / Area </a></li>
                              @endcan

                              @can('read almacen')
                                  <li><a href="{{URL::action('AlmacenController@index')}}"><i class="fa fa-street-view"></i> Almacen </a></li>
                              @endcan
                            </ul>
                        </li>



                        <li><a class="sidebar-sub-toggle"><i class="fa fa-building-o"></i>Gestionar Rubro/Bien<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                              @can('read rubro')
                                  <li><a href="{{URL::action('RubroController@index')}}"><i class="fa fa-file-text"></i> Rubros Contables</a></li>
                              @endcan

                              @can('read categoria')
                                  <li><a href="{{URL::action('CategoriaController@index')}}"><i class="fa fa-chain-broken"></i> Tipo De Bien (Categoria)</a></li>
                              @endcan
                            </ul>
                        </li>


                        <li><a class="sidebar-sub-toggle"><i class="fa fa-shopping-cart"></i><i class="fa fa-money"></i>Ingreso<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                              @can('read adquisicion')
                                  <li><a href="{{URL::action('AdquisicionController@index')}}"><i class="fa fa-shopping-cart"></i> Ingreso </a></li>
                              @endcan
                            </ul>
                        </li>



                        <li><a class="sidebar-sub-toggle"><i class="fa fa-file-archive-o"></i>Reportes<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                              @can('read bien')
                                  <li><a href="/report/activoFijo"><i class="fa fa-circle-o"></i> Reporte de Activo Fijo</a></li>
                              @endcan

                              @can('read baja')
                                  <li><a href="/report/baja"><i class="fa fa-circle-o"></i> Reporte de Bajas</a></li>
                              @endcan

                              @can('read baja')
                                  <li><a href="/report/bitacora"><i class="fa fa-circle-o"></i> Reporte de Botacora</a></li>
                              @endcan
                            </ul>
                        </li>


                        @role('super-admin')
                        <li><a class="sidebar-sub-toggle"><i class="fa fa-users"></i>Gestionar Usuario<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                              <li><a href="{{URL::action('UsuarioController@index')}}"><i class="fa fa-circle-o"></i> Usuario</a></li>
                              <li><a href="{{URL::action('Log_ChangeController@index')}}"><i class="fa fa-circle-o"></i> Visualizar Bitacora</a></li>
                            </ul>
                        </li>
                        @endrole

                    </ul>
                </div>
            </div>
        </div>
        <!-- /# sidebar -->


        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="float-right">
                            <ul>




                                <li class="header-icon dib" id="Notifications"></li>




                                <li class="header-icon dib"><i class="ti-email"></i>
                                    <div class="drop-down">
                                        <div class="dropdown-content-heading">
                                            <span class="text-left">2 New Messages</span>
                                            <a href="{{asset('email.html')}}"><i class="ti-pencil-alt pull-right"></i></a>
                                        </div>
                                        <div class="dropdown-content-body">
                                            <ul>
                                                <li class="notification-unread">
                                                    <a href="#">
                                                <img class="pull-left m-r-10 avatar-img" src="{{asset('assets/images/avatar/1.jpg')}}" alt="" />
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34 PM</small>
                                                    <div class="notification-heading">Michael Qin</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                                </li>
                                                <li class="notification-unread">
                                                    <a href="#">
                                                <img class="pull-left m-r-10 avatar-img" src="{{asset('assets/images/avatar/2.jpg')}}" alt="" />
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34 PM</small>
                                                    <div class="notification-heading">Mr. John</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                <img class="pull-left m-r-10 avatar-img" src="{{asset('assets/images/avatar/3.jpg')}}" alt="" />
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34 PM</small>
                                                    <div class="notification-heading">Michael Qin</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                <img class="pull-left m-r-10 avatar-img" src="{{asset('assets/images/avatar/2.jpg')}}" alt="" />
                                                <div class="notification-content">
                                                    <small class="notification-timestamp pull-right">02:34 PM</small>
                                                    <div class="notification-heading">Mr. John</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                                </li>
                                                <li class="text-center">
                                                    <a href="#" class="more-link">See All</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="header-icon dib"><span class="user-avatar">{{auth()->user()->name}} <i class="ti-angle-down f-s-10"></i></span>
                                    <div class="drop-down dropdown-profile">
                                        <div class="dropdown-content-heading">
                                            <span class="text-left">Miembro desde {{auth()->user()->created_at}}</span>
                                            <p class="trial-day">{{auth()->user()->roles->implode('name',',')}}</p>
                                        </div>
                                        <div class="dropdown-content-body">
                                            <ul>
                                                <li><a href="#"><i class="ti-user"></i> <span>Profile</span></a></li>

                                                <li><a href="#"><i class="ti-email"></i> <span>Inbox</span></a></li>
                                                <li><a href="#"><i class="ti-settings"></i> <span>Setting</span></a></li>

                                                <li><a href="#"><i class="ti-lock"></i> <span>Lock Screen</span></a></li>
                                                <li><a href="{{url('logout')}}"><i class="ti-power-off"></i> <span>Logout</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenido -->
        <div class="content-wrap">
        <div class="main">
          <div class="container-fluid">
        @yield('contenido')
      </div>
    </div>
    </div>

        <div id="search">
            <button type="button" class="close">×</button>
            <form>
                <input type="search" value="" placeholder="type keyword(s) here" />
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        <!-- jquery vendor -->

        <script src="https://js.pusher.com/6.0/pusher.min.js"></script>
        <script src="{{asset('assets/js/lib/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/lib/jquery.nanoscroller.min.js')}}"></script>
        <!-- nano scroller -->
        <script src="{{asset('assets/js/lib/menubar/sidebar.js')}}"></script>
        <script src="{{asset('assets/js/lib/preloader/pace.min.js')}}"></script>
        <!-- sidebar -->
        <script src="{{asset('assets/js/lib/bootstrap.min.js')}}"></script>

        <!-- bootstrap -->

        <script src="{{asset('assets/js/lib/circle-progress/circle-progress.min.js')}}"></script>
        <script src="{{asset('assets/js/lib/circle-progress/circle-progress-init.js')}}"></script>

        <script src="{{asset('assets/js/lib/weather/jquery.simpleWeather.min.js')}}"></script>
        <script src="{{asset('assets/js/lib/weather/weather-init.js')}}"></script>
        <script src="{{asset('assets/js/lib/owl-carousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('assets/js/lib/owl-carousel/owl.carousel-init.js')}}"></script>
        <script src="{{asset('assets/js/scripts.js')}}"></script>
        <!-- scripit init-->

        @stack('scripts')

        <script>

          $(document).ready(function(){

            $.ajax({

              type: "get",
              url: "/main/notification",
              data: '',
              cache: false,
              success: function(data){
                $('#Notifications').html(data);
              }

            });

          });

        </script>

    </body>

</html>
