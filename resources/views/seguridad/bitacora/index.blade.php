@extends ('layouts.principal')
@section ('contenido')

<div class="row">
		<div class="col-lg-8 p-r-0 title-margin-right">
				<div class="page-header">
						<div class="page-title">
								<h1>Bitacora</h1>
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
											@include('seguridad.bitacora.search')
												<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
														<thead>
																<tr>
																	<th>Usuario</th>
																	<th>Email</th>
																	<th>Accion Realizada</th>
																	<th>Fecha y Hora de la accion</th>
																</tr>
														</thead>
														<tbody>
															@foreach($log as $l)
															<tr>
																<th>{{$l->name}}</th>
																<th>{{$l->email}}</th>
																<th>{{$l->accion}}</th>
																<th>{{$l->fechaAccion}}</th>
															</tr>
															@endforeach
														</tbody>
												</table>
										</div>
								</div>
								{{$log->render()}}
						</div>
						<div>
						<a href="/seguridad/reporteBitacora"> <button class="btn btn-primary">descargar PDF</button> </a>
						</div>
						<!-- /# card -->
				</div>
				<!-- /# column -->
		</div>
		<!-- /# row -->

</section>

@endsection
