@extends('layouts.principal')
@section('contenido')
    <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3>Registrar Ubicacion</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error )
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>                
            @endif
    
    {!!Form::open(array('url'=>'ubicacion/ubicacion','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}
    <div class="row col-lg-12 col-sm-12 col-md-12 col-xs-12">
            
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                    <label for="edificio">Nombre Edificio</label>
                    <input type="text" name="edificio" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre...">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="ciudad">Ciudad</label>
                <input type="text" name="ciudad" required value="{{old('nombre')}}" class="form-control" placeholder="ciudad...">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="pais">Pais</label>
                <input type="text" value="{{old('nombre')}}" name="pais" class="form-control" placeholder="pais">
            </div>
        </div>
    </div>
    <div class="form-group col-md-6">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <button type="reset" class="btn btn-danger">Cancelar</button>
    </div>

    {!!Form::close()!!}
</div>
@endsection