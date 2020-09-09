@extends ('layouts.principal')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Proveedor</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'empleado/proveedor','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="codigo">Codigo</label>
            	<input type="number" name="codigo" class="form-control" placeholder="Codigo...">
            </div>

            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" placeholder="Nombre...">
            </div>

            <div class="form-group">
            	<label for="apellido">Apellido</label>
            	<input type="text" name="apellido" class="form-control" placeholder="Apellido...">
            </div>
            <div class="form-group">
            	<label for="telefono">Telefono</label>
            	<input type="number" name="telefono" class="form-control" placeholder="Telefono...">
            </div>

            <div class="form-group">
                  <label for="direccion">Email</label>
                  <input type="email" name="direccion" class="form-control" placeholder="Email...">
            </div>

            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection