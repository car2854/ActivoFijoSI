@extends('layouts.principal')
@section ('contenido')
  <div class="row">
    <div  class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <h3>Nueva Revision Tecnica</h3>
      @if (count($errors)>0)
      <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        </ul>
      </div>
      @endif

      {!!Form::open(array('url'=>'RevisionTecnica/revisiontecnica','method'=>'POST','autocomplete'=>'off'))!!}
      {{Form::token()}}

      <div class="form-group">
        <label>Bien</label>
        <select class="form-control" name="CodBien">
          <option>Seleccione un bien</option>
          @foreach($bien as $b)
          <option value="{{ $b->CodBien }}">{{  $b->CodBien  }} - {{  $b->Nombre  }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label>Custodio</label>
        <select class="form-control" name="CodCustodio">
          <option>Seleccione un custodio</option>
          @foreach($custodio as $c)
          <option value="{{ $c->CodCustodio }}">{{  $c->Nombre  }} {{  $c->Apellido  }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label>Operador</label>
        <select class="form-control" name="CodOperador">
          <option>Seleccione un operador</option>
          @foreach($operador as $o)
          <option value="{{ $o->CodOperador }}">{{  $o->Nombre  }} {{  $o->Apellido  }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <button class="btn btn-primary" type="submit">Guardar</button>
        <button class="btn btn-danger" type="reset">Cancelar</button>
      </div>

      {!!Form::close()!!}

    </div>
  </div>
@endsection
