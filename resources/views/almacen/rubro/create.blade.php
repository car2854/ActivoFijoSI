@extends('layouts.principal')
@section('contenido')


<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Registrar Rubro</h1>
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

                                    {!!Form::open(array('url'=>'almacen/rubro','method'=>'POST','autocomplete'=>'off'))!!}
                                    {{Form::token()}}


                                    <div class="row col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label for="descripcion">Nombre del Rubro</label>
                                            <input type="text" name="descripcion" class="form-control" placeholder="Nombre...">
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label for="vidautil">Vida Util (años)</label>
                                            <input type="number" class="form-control" name="vidautil" >
                                        </div>
                                    </div>



                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                            <div class="form-check form-check-inline col-md-3">
                                                <input class="form-check-input" type="checkbox" value = "1" name="deprecia">
                                                <label class="form-check-label" for="deprecia">
                                                    <h4>Deprecia</h4>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline col-md-3">
                                                <input class="form-check-input" type="checkbox" value = "1" name="actualiza">
                                                <label class="form-check-label" for="actualiza">
                                                     <h4>Actualiza</h4>
                                                </label>
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
