@extends ('layouts.principal')
@section ('contenido')

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <div class="logo"><a href="index.html"><!-- <img src="assets/images/logo.png" alt="" /> --><span>Focus</span></a></div>
                <ul>
                    <li class="label">Main</li>
                    <li class="active"><a class="sidebar-sub-toggle"><i class="ti-home"></i> Dashboard <span class="badge badge-primary">2</span> <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="index.html">Dashboard 1</a></li>
                            <li><a href="index1.html">Dashboard 2</a></li>



                        </ul>
                    </li>

                    <li class="label">Apps</li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i>  Charts  <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="chart-flot.html">Flot</a></li>
                            <li><a href="chart-morris.html">Morris</a></li>
                            <li><a href="chartjs.html">Chartjs</a></li>
                            <li><a href="chartist.html">Chartist</a></li>
                            <li><a href="chart-peity.html">Peity</a></li>
                            <li><a href="chart-sparkline.html">Sparkle</a></li>
                            <li><a href="chart-knob.html">Knob</a></li>
                        </ul>
                    </li>
                    <li><a href="app-event-calender.html"><i class="ti-calendar"></i> Calender </a></li>
                    <li><a href="app-email.html"><i class="ti-email"></i> Email</a></li>
                    <li><a href="app-profile.html"><i class="ti-user"></i> Profile</a></li>
                    <li><a href="app-widget-card.html"><i class="ti-layout-grid2-alt"></i> Widget</a></li>
                    <li class="label">Features</li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-layout"></i> UI Elements <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="ui-typography.html">Typography</a></li>
                            <li><a href="ui-alerts.html">Alerts</a></li>

                            <li><a href="ui-button.html">Button</a></li>
                            <li><a href="ui-dropdown.html">Dropdown</a></li>

                            <li><a href="ui-list-group.html">List Group</a></li>

                            <li><a href="ui-progressbar.html">Progressbar</a></li>
                            <li><a href="ui-tab.html">Tab</a></li>

                        </ul>
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-panel"></i> Components <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="uc-calendar.html">Calendar</a></li>
                            <li><a href="uc-carousel.html">Carousel</a></li>
                            <li><a href="uc-weather.html">Weather</a></li>
                            <li><a href="uc-datamap.html">Datamap</a></li>
                            <li><a href="uc-todo-list.html">To do</a></li>
                            <li><a href="uc-scrollable.html">Scrollable</a></li>
                            <li><a href="uc-sweetalert.html">Sweet Alert</a></li>
                            <li><a href="uc-toastr.html">Toastr</a></li>
                            <li><a href="uc-range-slider-basic.html">Basic Range Slider</a></li>
                            <li><a href="uc-range-slider-advance.html">Advance Range Slider</a></li>
                            <li><a href="uc-nestable.html">Nestable</a></li>

                            <li><a href="uc-rating-bar-rating.html">Bar Rating</a></li>
                            <li><a href="uc-rating-jRate.html">jRate</a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-layout-grid4-alt"></i> Table <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="table-basic.html">Basic</a></li>

                            <li><a href="table-export.html">Datatable Export</a></li>
                            <li><a href="table-row-select.html">Datatable Row Select</a></li>
                            <li><a href="table-jsgrid.html">Editable </a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-heart"></i> Icons <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="font-themify.html">Themify</a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-map"></i> Maps <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="gmaps.html">Basic</a></li>
                            <li><a href="vector-map.html">Vector Map</a></li>
                        </ul>
                    </li>
                    <li class="label">Form</li>
                    <li><a href="form-basic.html"><i class="ti-view-list-alt"></i> Basic Form </a></li>
                    <li class="label">Extra</li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-files"></i> Invoice <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="invoice.html">Basic</a></li>
                            <li><a href="invoice-editable.html">Editable</a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-target"></i> Pages <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="page-login.html">Login</a></li>
                            <li><a href="page-register.html">Register</a></li>
                            <li><a href="page-reset-password.html">Forgot password</a></li>
                        </ul>
                    </li>
                    <li><a href="../documentation/index.html"><i class="ti-file"></i> Documentation</a></li>
                    <li><a><i class="ti-close"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>




	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Bien</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'bienes/bien','method'=>'POST','autocomplete'=>'off','name'=>'Formulario1'))!!}
            {{Form::token()}}

<div class="row">
      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

            <div class="form-group">
            	<label for="CodBien">Codigo</label>
            	<input type="text" readonly="readonly" name="CodBien" class="form-control" placeholder="Codigo...">
            </div>

      </div>


      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">

            <div class="form-group">
            	<label for="Nombre">Nombre</label>
            	<input type="text" name="Nombre" class="form-control" placeholder="Nombre...">
            </div>

      </div>


      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

            <div class="form-group">
            	<label for="FechaAdquisicion">Fecha de Adquisicion</label>
            	<input type="date" name="FechaAdquisicion" class="form-control">
            </div>

      </div>


      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

            <div class="form-group">
            	<label for="ValorCompra">Valor de Compra</label>
            	<input type="number" name="ValorCompra" class="form-control" placeholder="Valor de Compra...">
            </div>

      </div>


      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

            <div class="form-group">
                  <label>Estado</label>
                  <select name="Estado" class="form-control" >
                        <option value="Nuevo">Nuevo</option>
                        <option value="Usado">Usado</option>
                  </select>

            </div>

      </div>


      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

             <div class="form-group">
                  <label>Almacen de Origen</label>
                  <select name="UbicacionAlmacen" class="form-control">
                        <option value="">---Seleccione Almacen---</option>
                        @foreach($almacenes as $alma)
                        <option value="{{$alma->NroAlmacen}}">{{$alma->Direccion}}</option>
                        @endforeach
                  </select>
            </div>

      </div>


      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

             <div class="form-group">
                  <label>Departamento Destino</label>
                  <select name="UbicacionDepartamento" class="form-control" onchange= "seleccinar1()">
                        <option value="">---Seleccione Departamento---</option>
                        @foreach($departamentos as $depa)
                        <option value="{{$depa->CodDepartamento}}">{{$depa->Descripcion}}</option>
                        @endforeach
                  </select>
            </div>

      </div>



      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

             <div class="form-group">
                  <label>Rubro</label>
                  <select name="CodRubro" class="form-control" id="CodRubro" onchange= "seleccinar2()">
                        <option value="">---Seleccione Rubro---</option>
                        @foreach($rubros as $rub)
                        <option value="{{$rub->CodRubro}}">{{$rub->Descripcion}}</option>
                        @endforeach
                  </select>
            </div>

      </div>


      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

            <div class="form-group">
                <label>Categoria</label>
                <select name="CodCategoria" class="form-control" id="CodCategoria" onchange="seleccinar3()">
                    <option value="">---Seleccione Categoria---</option>
                    @foreach ($categorias as $c)
                        <option value="{{$c->CodCategoria}}">{{$c->Nombre}}</option>
                    @endforeach
                </select>

            </div>

      </div>
</div>

            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>




	{!!Form::close()!!}


            <script type="text/javascript">
                  var codDepa = 0;
                  var codRubro = 0;
                  var codCat = 0;

                  function seleccinar1(){
                        var opt;
                        opt = document.Formulario1.UbicacionDepartamento[document.Formulario1.UbicacionDepartamento.selectedIndex].value;
                        codDepa = opt;
                  }

                  function seleccinar2(){
                        var opt;
                        opt = document.Formulario1.CodRubro[document.Formulario1.CodRubro.selectedIndex].value;
                        codRubro = opt;
                  }

                  function seleccinar3(){
                        var opt;
                        opt = document.Formulario1.CodCategoria[document.Formulario1.CodCategoria.selectedIndex].value;
                        codCat = opt;

                        var codigo = codDepa.toString()+ codRubro.toString()+"-"+codCat.toString();

                        var random = "-"+Date.now() + Math.random();
                        var cod = random.substring(random.length-4,random.length);

                        var aux = ""+Math.random()*10;
                        var aux2 = aux.substring(2,4);

                        codigo = codigo + "-" + cod +"-"+ aux2;

                        document.Formulario1.CodBien.value = codigo;


                  }


            </script>


		</div>
	</div>
@endsection
