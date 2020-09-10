@extends ('layouts.principal')
@section ('contenido')

<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Revaluo</h1>
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

                                    {!!Form::open(array('url'=>'RevisionTecnica/Revaluo','method'=>'POST','autocomplete'=>'off','route'=>array('route.name',$NroR)))!!}
                                    {{Form::token()}}

                                    <div class="form-group">
                                        <label for="Estado">Estado</label>
                                        <input type="text" name="Estado" class="form-control" placeholder="Estado...">
                                    </div>

                                    <div class="form-group">
                                        <label for="Monto">Monto</label>
                                        <input type="text" name="Monto" class="form-control" placeholder="Monto...">
                                    </div>

                                    <div class="form-group">
                                        <label for="Descripcion">Descripcion</label>
                                        <input type="text" name="Descripcion" class="form-control" placeholder="Descripcion...">

                                        <input type="text" name="NroRevision" class="form-control" value="{{$NroR}}" placeholder="Descripcion..." style="visibility:hidden">
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Guardar</button>
                                        <button class="btn btn-danger" type="reset">Cancelar</button>
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
