@extends('layouts.principal')
@section ('contenido')
  <div class="row">
    <div  class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <h3>Editar Categoria</h3>
      @if (count($errors)>0)
      <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        </ul>
      </div>
      @endif

      {!!Form::model($almacen,['method'=>'PATCH','route'=>['Almacen.update',$almacen->NroAlmacen]])!!}
      {{Form::token()}}

      <div class="form-group">
        <label for="NroAlmacen">Numero Almacen</label>
        <input type="text" readonly="readonly" name="NroAlmacen" class="form-control" value="{{$almacen->NroAlmacen}}" placeholder="NroAlmacen...">
      </div>

      <div class="form-group">
        <label for="NroAlmacen">Direccion</label>
        <input type="text" name="Direccion" class="form-control" value="{{$almacen->Direccion}}" placeholder="Direccion...">
      </div>

      <div class="form-group">
        <button class="btn btn-primary" type="submit">Guardar</button>
        <button class="btn btn-danger" type="reset">Cancelar</button>
      </div>

      {!!Form::close()!!}

    </div>
  </div>
@endsection
