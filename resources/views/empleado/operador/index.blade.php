@extends ('layouts.principal')
@section ('contenido')

<div class="row">
		<div class="col-lg-8 p-r-0 title-margin-right">
				<div class="page-header">
						<div class="page-title">
								<h1>Listado de operadores <a href="operador/create"><button class="btn btn-success">Nuevo</button></a>
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
											@include('empleado.operador.search')
												<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
														<thead>
																<tr>
																	<th>Codigo</th>
																	<th>Nombre</th>
																	<th>Apellido</th>
																	<th>Telefono</th>
																	<th>Email</th>
																	<th>Opciones</th>
																</tr>
														</thead>
														<tbody>
															@foreach($operador as $ope)
															<tr>
																<th>{{ $ope->CodOperador}}</th>
																<th>{{ $ope->Nombre}}</th>
																<th>{{ $ope->Apellido}}</th>
																<th>{{ $ope->Telefono}}</th>
																<th>{{ $ope->Gmail}}</th>
																<th>
																	<a href="{{URL::action('OperadorController@edit',$ope->CodOperador)}}"><button class="btn btn-info float-right">Editar</button></a>
																	<a href="" data-target="#modal-delete-{{$ope->CodOperador}}" data-toggle="modal"><button class="btn btn-danger float-right">Eliminar</button></a>

																</th>

															</tr>
															@include('empleado.operador.modal')
															@endforeach
														</tbody>
												</table>
										</div>
								</div>
								{{$operador->render()}}
						</div>
						<div>
						<a href="/empleado/reporteOperador"> <button class="btn btn-primary">descargar PDF</button> </a>
						</div>
						<!-- /# card -->
				</div>
				<!-- /# column -->
		</div>
		<!-- /# row -->

</section>

@endsection
