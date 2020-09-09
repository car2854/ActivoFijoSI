@extends ('layouts.principal')
@section ('contenido')
  <div class="row">
    <div  class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <h3>Editar Operador</h3>
      @if (count($errors)>0)
      <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        </ul>
      </div>
      @endif

      {!!Form::model($operador,['method'=>'PATCH','route'=>['Operador.update',$operador->CodOperador]])!!}
      {{Form::token()}}

      <div class="form-group">
        <label for="Nombre">Nombre</label>
        <input type="text" name="Nombre" class="form-control" value="{{$operador->Nombre}}" placeholder="Nombre...">
      </div>

      <div class="form-group">
        <label for="Apellido">Apellido</label>
        <input type="text" name="Apellido" class="form-control" value="{{$operador->Apellido}}" placeholder="Apellido...">
      </div>

      <div class="form-group">
        <label for="Telefono">Telefono</label>
        <input type="text" name="Telefono" class="form-control" value="{{$operador->Telefono}}" placeholder="Telefono...">
      </div>

      <div class="form-group">
        <label for="Gmail">Gmail</label>
        <input type="text" name="Gmail" class="form-control" value="{{$operador->Gmail}}" placeholder="Gmail...">
      </div>

      <div class="form-group">
        <button class="btn btn-primary" type="submit">Guardar</button>
        <button class="btn btn-danger" type="reset">Cancelar</button>
      </div>

      {!!Form::close()!!}

    </div>
  </div>
@endsection
