@extends ('layouts.principal')
@section ('contenido')

<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Hello, <span>Welcome Here</span></h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                    <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Form-Basic</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>
            <!-- /# row -->
            <section id="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Input Style</h4>

                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form>
                                        <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">the input classes on an <code>input-default</code> for Default input.</p>
                                            <input type="text" class="form-control input-default " placeholder="Input Default">
                                        </div>
                                        <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">the input classes on an <code>input-flat</code> for flat input.</p>
                                            <input type="text" class="form-control input-flat" placeholder="Input Flat ">
                                        </div>
                                        <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">the input classes on an <code>input-rounded</code> for rounded input.</p>
                                            <input type="text" class="form-control input-rounded" placeholder="Input Rounded">
                                        </div>
                                        <div class="form-group">
                                            <p class="text-muted m-b-15 f-s-12">the input classes on an <code>input-focus</code> for focus input.</p>
                                            <input type="text" class="form-control input-focus" placeholder="Input Focus">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer">
                            <p>2018 © Admin Board. - <a href="#">example.com</a></p>
                        </div>
                    </div>
                </div>
            </section>
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
