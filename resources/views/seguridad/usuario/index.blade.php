@extends ('layouts.principal')
@section ('contenido')

<div class="row">
		<div class="col-lg-8 p-r-0 title-margin-right">
				<div class="page-header">
						<div class="page-title">
								<h1>Listado de usuarios <a href="usuario/create"><button class="btn btn-success">Nuevo</button></a>
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
											@include('seguridad.usuario.search')
												<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
														<thead>
																<tr>
																	<th>Nombre</th>
																	<th>Email</th>
													        <th>Rol</th>
													        <th>Fecha de creacion</th>
																	<th>Opciones</th>
																</tr>
														</thead>
														<tbody>
															@foreach($usuarios as $usu)
															<tr>

																<th>{{$usu->name}}</th>
																<th>{{$usu->email}}</th>
																<th>{{$usu->rol}}</th>
																<th>{{$usu->created_at}}</th>
																<th>
																	<a href="{{URL::action('UsuarioController@edit',$usu->id)}}"><button class="btn btn-info float-right">Editar</button></a>
																	<a href="" data-target="#modal-delete-{{$usu->id}}" data-toggle="modal"><button class="btn btn-danger float-right">Eliminar</button></a>
																	<a href="#myModal" data-toggle="modal"><button class="btn btn-success float-right" onclick="desplegar({{ $usu->id }})">Ultimas Actividades</button></a>
																</th>




															</tr>


															@include('seguridad.usuario.modal')
															@endforeach
														</tbody>
												</table>
										</div>
								</div>
								{{$usuarios->render()}}
						</div>
						<div>
						<a href="/seguridad/reporteUsuario"> <button class="btn btn-primary">descargar PDF</button> </a>
						</div>
						<!-- /# card -->
				</div>
				<!-- /# column -->
		</div>
		<!-- /# row -->

</section>






<!-- Modal -->
<div aria-hidden="true" role="dialog" tabindex="-1" id="myModal" class="modal fade">
	<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
				<div class="Informacion" id="Informacion">

				</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  <!-- /.modal-dialog -->
</div>





@push('scripts')

<script>

	function desplegar(id){

      var datastr = "Id=" + id;

      $.ajax({

        type: "get",
        url: "/usuario/RegistroActividades",
        data: datastr,
        cache: false,
        success: function(data){
          $('#Informacion').html(data);
        }

      });



	}

</script>

@endpush



@endsection
