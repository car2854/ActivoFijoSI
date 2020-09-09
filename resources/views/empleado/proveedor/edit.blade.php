@extends ('layouts.principal')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Proveedor: {{$proveedor->Nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

		{!!Form::model($operador,['method'=>'PATCH','route'=>['proveedor.update',$proveedor->CodProveedor]])!!}
            {{Form::token()}}
            
            <div class="form-group">
                  <label for="codigo">Codigo</label>
                  <input type="number" name="codigo" class="form-control" value="{{$proveedor->CodProveedor}}">
            </div>

            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control"  value="{{$proveedor->Nombre}}">
            </div>

            <div class="form-group">
            	<label for="apellido">Apellido</label>
            	<input type="text" name="apellido" class="form-control"  value="{{$proveedor->Apellido}}">
            </div>
            <div class="form-group">
            	<label for="telefono">Telefono</label>
            	<input type="number" name="telefono" class="form-control"  value="{{$proveedor->Telefono}}">
            </div>

            <div class="form-group">
                  <label for="gmail">Email</label>
                  <input type="email" name="gmail" class="form-control"  value="{{$proveedor->Direccion}}">
            </div>

            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection