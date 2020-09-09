@extends ('layouts.principal')
@section ('contenido')

<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                <h1>Reporte de Bienes</h1>
            </div>
        </div>
    </div>
</div>
<!-- /# row -->
<section id="main-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="bootstrap-data-table-panel">
                    <div class="table-responsive">
                      @include('depreciacion.depreciacion.search')
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                  <th>Codigo Bien</th>
                                  <th>Nombre</th>
                                  <th>Departamento</th>
                                  <th>Depreciacion</th>
                                  <th>Valor Compra</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($bienes as $bien)
                              <tr>
                                  <th>{{$bien['CodBien']}}</th>
                                  <th>{{$bien['Nombre']}}</th>
                                  <th>{{$bien['Descripcion']}} </th>
                                  <th>{{$bien['depreciacion']}} %</th>
                                  <th>{{$bien['ValorCompra']}}</th>
                                  <th>
                                  </th>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div>
            <a href="/depreciacion/reporteDepreciacion"> <button class="btn btn-primary">descargar PDF</button> </a>
            </div>
            <!-- /# card -->
        </div>
        <!-- /# column -->
    </div>
    <!-- /# row -->

</section>

@endsection
