@extends('layouts.principal')
@section('contenido')
    <div class="form-row col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Solicitar Peticion</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error )
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>                
            @endif
            {!!Form::open(array('url'=>'solicitud/solicitud','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <label for="FechaHora">Fecha de solicitud</label>
                <input type="date" name="FechaHora" class="form-control" >
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Custodio</label>
                    <select name="CodCustodio" class="form-control">
                        @foreach ($custodio as $c)
                            <option value="{{$c->CodCustodio}}">{{$c->Nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Responsable</label>
                    <select name="CodResponsable" class="form-control">
                        @foreach ($responsable as $r)
                            <option value="{{$r->CodResponsable}}">{{$r->Nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group col-md-6">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
            </div>


            {!!Form::close()!!}
    </div>
@endsection