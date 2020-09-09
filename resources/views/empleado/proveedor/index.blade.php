@extends ('layouts.principal')
@section ('contenido')

<div class="row">
		<div class="col-lg-8 p-r-0 title-margin-right">
				<div class="page-header">
						<div class="page-title">
								<h1>Listado de Proveedores <a href="proveedor/create"><button class="btn btn-success">Nuevo</button></a>
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
											@include('empleado.proveedor.search')
												<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
														<thead>
																<tr>
																	<th>Codigo</th>
																	<th>Nombre</th>
																	<th>Apellido</th>
																	<th>Telefono</th>
																	<th>Direccion</th>
																	<th>Opciones</th>
																</tr>
														</thead>
														<tbody>
															@foreach($proveedor as $prov)
															<tr>
																<th>{{ $prov->CodProveedor}}</th>
																<th>{{ $prov->Nombre}}</th>
																<th>{{ $prov->Apellido}}</th>
																<th>{{ $prov->Telefono}}</th>
																<th>{{ $prov->Direccion}}</th>
																<th>
																	<a href="{{URL::action('ProveedorController@edit',$prov->CodProveedor)}}"><button class="btn btn-info float-right">Editar</button></a>
																	<a href="" data-target="#modal-delete-{{$prov->CodProveedor}}" data-toggle="modal"><button class="btn btn-danger float-right">Eliminar</button></a>

																</th>

															</tr>
															@include('empleado.proveedor.modal')
															@endforeach
														</tbody>
												</table>
										</div>
								</div>
								{{$proveedor->render()}}
						</div>
						<div>
						<a href="/empleado/reporteProveedor"> <button class="btn btn-primary">descargar PDF</button> </a>
						</div>
						<!-- /# card -->
				</div>
				<!-- /# column -->
		</div>
		<!-- /# row -->

</section>


@endsection
