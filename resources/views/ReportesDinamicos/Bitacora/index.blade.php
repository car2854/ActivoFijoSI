@extends('layouts.principal')
@section('contenido')


        <h3>Bajas</h3>
        <!-- /.box-header -->



        <div class="row col-md-12">
          <div class="col-md-6">
            <div class="form-group">
              <label for="Usuario">Usuario</label>
              <select name="Usuario" class="form-control selectpicker" style="width: 100%;">
                <option selected="selected">Todos</option>
                  @foreach($user as $us)
                  <option>{{$us->name}}</option>
                  @endforeach
              </select>
            </div>
          </div>



          <div class="col-md-6">
            <!-- /.form-group -->
            <div class="form-group">
              <label for="Rol">Rol</label>
              <select name="Rol" class="form-control selectpicker" style="width: 100%;">
                <option selected="selected">Todos</option>

                  @foreach($rol as $r)
                  <option>{{$r->name}}</option>
                  @endforeach

              </select>
            </div>
            <!-- /.form-group -->

          </div>
        </div>

        <div class="row col-md-12">

          <div class="col-md-6">
            <div class="form-group">
            	<label for="FechaInicio">Fecha inicio</label>
            	<input type="date" name="FechaInicio" class="form-control">
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
            	<label for="FechaFin">Fecha fin</label>
            	<input type="date" name="FechaFin" class="form-control">
            </div>
          </div>

        </div>


        <span class="input-group-btn">
          <button type="submit" onclick="buscar()" class="btn btn-primary">Aceptar</button>
        </span>

        <div class="Information" id="Information">

        </div>

        <span class="input-group-btn">
          <a type="submit" class="btn btn-primary" onclick="descargarPDF()" style="color:#FFFFFF">Descargar PDF</a>
        </span>

        @push('scripts')

<script>

    $(document).ready(function(){
      ajaxInformation();
    });

    function buscar(){
      ajaxInformation();
    }

    function descargarPDF(){

      var Usuario = document.getElementsByName("Usuario")[0].value;
      var Rol = document.getElementsByName("Rol")[0].value;
      var FechaInicio = document.getElementsByName("FechaInicio")[0].value;
      var FechaFin = document.getElementsByName("FechaFin")[0].value;

      if (FechaInicio == ''){
        FechaInicio = '0';
      }
      if (FechaFin == ''){
        FechaFin = '0';
      }


      var datastr = "/" + Usuario + "/" + Rol + "/" + FechaInicio + "/" + FechaFin;

      location.href ="/report/bitacora/getPDF"+datastr;

      /*$.ajax({

        type: "post",
        url: "/report/activoFijo/getInformation",
        data: datastr,
        cache: false,
        success: function(data){

        }

      });*/

    }


    function ajaxInformation(){

      var Usuario = document.getElementsByName("Usuario")[0].value;
      var Rol = document.getElementsByName("Rol")[0].value;
      var FechaInicio = document.getElementsByName("FechaInicio")[0].value;
      var FechaFin = document.getElementsByName("FechaFin")[0].value;

      var datastr = "Usuario=" + Usuario + "&Rol=" + Rol + "&FechaInicio=" + FechaInicio + "&FechaFin=" + FechaFin;

      console.log(datastr);

      $.ajax({

        type: "get",
        url: "/report/bitacora/getInformation",
        data: datastr,
        cache: false,
        success: function(data){
          $('#Information').html(data);
        }

      });
    }

</script>

@endpush





@endsection
