@extends ('layouts.principal')
@section ('contenido')

<div class="row">
		<div class="col-lg-8 p-r-0 title-margin-right">
				<div class="page-header">
						<div class="page-title">
								<h1>Listado de responsables <a href="responsable/create">
								    @can('create responsable')
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
											@include('empleado.responsable.search')
												<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
														<thead>
																<tr>
																	<th>Codigo</th>
																	<th>Nombre</th>
																	<th>Apellido</th>
																	<th>Telefono</th>
																	@can('update responsable')
																	<th>Opciones</th>
																	@endcan
																</tr>
														</thead>
														<tbody>
															@foreach($responsables as $res)
															<tr>
																<th>{{ $res->CodResponsable}}</th>
																<th>{{ $res->Nombre}}</th>
																<th>{{ $res->Apellido}}</th>
																<th>{{ $res->Telefono}}</th>
																<th>

																	<a href="{{URL::action('ResponsableController@edit',$res->CodResponsable)}}">
																	    @can('update responsable')
																	    <button class="btn btn-info float-right">Editar</button>
																	    @endcan
																	    </a>
																	<a href="" data-target="#modal-delete-{{$res->CodResponsable}}" data-toggle="modal">
																	@can('delete responsable')
																	<button class="btn btn-danger float-right">Eliminar</button>
																	@endcan
																	</a>

																</th>
															</tr>
															@include('empleado.responsable.modal')
															@endforeach
														</tbody>
												</table>
										</div>
								</div>
								{{$responsables->render()}}
						</div>
						<div>
						<a href="/empleado/reporteResponsable"> <button class="btn btn-primary">descargar PDF</button> </a>
						</div>
						<!-- /# card -->
				</div>
				<!-- /# column -->
		</div>
		<!-- /# row -->

</section>



@endsection
