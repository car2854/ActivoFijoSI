@extends('layouts.principal')
@section ('contenido')
  <div class="row">
    <div  class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <h3>Nueva Categoria</h3>
      @if (count($errors)>0)
      <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        </ul>
      </div>
      @endif

      {!!Form::open(array('url'=>'Almacenamiento/Almacen','method'=>'POST','autocomplete'=>'off'))!!}
      {{Form::token()}}

      <div class="form-group">
        <label for="NroAlmacen">Numero Almacen</label>
        <input type="text" name="NroAlmacen" class="form-control" placeholder="Numero Almacen...">
      </div>

      <div class="form-group">
        <label for="Direccion">Direccion</label>
        <input type="text" name="Direccion" class="form-control" placeholder="Direccion...">
      </div>

      <div class="form-group">
        <button class="btn btn-primary" type="submit">Guardar</button>
        <button class="btn btn-danger" type="reset">Cancelar</button>
      </div>

      {!!Form::close()!!}

    </div>
  </div>
@endsection
