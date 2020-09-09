
@extends ('layouts.principal')
@section ('contenido')

  <div class="row">
      <div class="col-lg-8 p-r-0 title-margin-right">
          <div class="page-header">
              <div class="page-title">
                  <h1>Listado de Bienes
                    <a href="bien/create">
                      @can('create bien')
                      <button class="btn btn-success">Nuevo</button>
                      @endcan
                    </a>
                  </h1>
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
                        @include('bienes.bien.search')
                          <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                              <thead>
                                  <tr>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>FechaAdquisicion</th>
                                    <th>ValorCompra</th>
                                    <th>Departamento</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach($bienes as $bien)
                                <tr>
                                    <th>{{$bien->CodBien}}</th>
                                    <th>{{$bien->Nombre}}</th>
                                    <th>{{$bien->FechaAdquisicion}}</th>
                                    <th>{{$bien->ValorCompra}}</th>
                                    <th>{{$bien->Descripcion}}</th>
                                </tr>
                                @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
                  {{$bienes->render()}}
              </div>
              <div>
              <a href="/bienes/reporteBien"> <button class="btn btn-primary">descargar PDF</button> </a>
              </div>
              <!-- /# card -->
          </div>
          <!-- /# column -->
      </div>
      <!-- /# row -->

  </section>

@endsection
