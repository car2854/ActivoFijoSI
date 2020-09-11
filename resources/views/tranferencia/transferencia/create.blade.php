@extends('layouts.principal')
@section('contenido')


<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Registro de Transferencia</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /# row -->
            <section id="main-content">

                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    @if (count($errors)>0)
                                    <div class="alert alert-danger">
                                        <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                        </ul>
                                    </div>
                                    @endif

                                    {!!Form::open(array('url'=>'tranferencia/transferencia','method'=>'POST','autocomplete'=>'off'))!!}
                                    {{Form::token()}}
                                    <div class="row col-lg-12 col-sm-12 col-md-12 col-xs-12">

                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                            <div class="form-group">
                                                    <label for="nrotransferencia">Nro de Transferencia</label>
                                                    <input type="text" name="nrotransferencia" class="form-control" placeholder="Numero Tranferencia...">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                            <div class="form-group">
                                                    <label for="date">Fecha</label>
                                                    <input type="date" name="date" required class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Custodio Origen</label>
                                                <select name="cusorigen" class="form-control">
                                                    @foreach ($custodio as $cu)
                                                        <option value="{{$cu->CodCustodio}}">{{$cu->Nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Custodio Destino</label>
                                                <select name="cusdestino" class="form-control">
                                                    @foreach ($custodio as $cu)
                                                        <option value="{{$cu->CodCustodio}}">{{$cu->Nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Responsable</label>
                                                <select name="responsable" class="form-control">
                                                    @foreach ($responsable as $res)
                                                        <option value="{{$res->CodResponsable}}">{{$res->Nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Codigo Bien</label>
                                                <select name="bien" class="form-control">
                                                    @foreach ($bien as $bi)
                                                        <option value="{{$bi->CodBien}}">{{$bi->CodBien}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                            <button type="reset" class="btn btn-danger">Cancelar</button>
                                    </div>

                                    {!!Form::close()!!}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </div>
</div>



@endsection
