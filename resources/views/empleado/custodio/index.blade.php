@extends ('layouts.principal')
@section ('contenido')

<div class="row">
		<div class="col-lg-8 p-r-0 title-margin-right">
				<div class="page-header">
						<div class="page-title">
								<h1>Listado de custodios
									<a href="custodio/create"><button class="btn btn-success">Nuevo</button></a>
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
											@include('empleado.custodio.search')
												<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
														<thead>
																<tr>
																	<th>Codigo</th>
																	<th>Nombre</th>
																	<th>Apellido</th>
																	<th>Telefono</th>
																	<th>Departamento</th>
																	<th>Opciones</th>
																</tr>
														</thead>
														<tbody>
															@foreach($custodios as $cus)
															<tr>
																<th>{{$cus->CodCustodio}}</th>
																<th>{{$cus->Nombre}}</th>
																<th>{{$cus->Apellido}}</th>
																<th>{{$cus->Telefono}}</th>
																<th>{{$cus->Descripcion}}</th>
																<th>
																	<a href="{{URL::action('CustodioController@edit',$cus->CodCustodio)}}"><button class="btn btn-info float-right">Editar</button></a>
																	<a href="" data-target="#modal-delete-{{$cus->CodCustodio}}" data-toggle="modal"><button class="btn btn-danger float-right">Eliminar</button></a>
																</th>

															</tr>
															@include('empleado.custodio.modal')
															@endforeach
														</tbody>
												</table>
										</div>
								</div>
								{{$custodios->render()}}
						</div>
						<div>
						<a href="/empleado/reporteCustodio"> <button class="btn btn-primary">descargar PDF</button> </a>
						</div>
						<!-- /# card -->
				</div>
				<!-- /# column -->
		</div>
		<!-- /# row -->
</section>

@endsection
