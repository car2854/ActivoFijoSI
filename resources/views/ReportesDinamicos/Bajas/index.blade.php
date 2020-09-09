@extends('layouts.principal')
@section('contenido')


        <h3>Bajas</h3>
        <!-- /.box-header -->

        <div class="row col-md-12">
          <div class="col-md-4">
            <div class="form-group">
              <label for="NombreBien">Nombre Bien</label>
              <select name="NombreBien" class="form-control selectpicker" style="width: 100%;">
                <option selected="selected">Todos</option>
                  @foreach($bien as $b)
                  <option>{{$b->Nombre}}</option>
                  @endforeach
              </select>
            </div>
          </div>



          <div class="col-md-4">
            <!-- /.form-group -->
            <div class="form-group">
              <label for="NombreCategoria">Categoria</label>
              <select name="NombreCategoria" class="form-control selectpicker" style="width: 100%;">
                <option selected="selected">Todos</option>

                  @foreach($categoria as $c)
                  <option>{{$c->Nombre}}</option>
                  @endforeach

              </select>
            </div>
            <!-- /.form-group -->

          </div>

          <div class="col-md-4">
            <!-- /.form-group -->
            <div class="form-group">
              <label for="Custodio">Custodio</label>
              <select name="Custodio" class="form-control selectpicker" style="width: 100%;">
                <option selected="selected">Todos</option>

                  @foreach($custodio as $cus)
                  <option>{{$cus->Nombre}}</option>
                  @endforeach

              </select>
            </div>
          </div>

        </div>


        <div class="row col-md-12">

          <div class="col-md-4">
            <!-- /.form-group -->
            <div class="form-group">
              <label for="Operador">Operador</label>
              <select name="Operador" class="form-control selectpicker" style="width: 100%;">
                <option selected="selected">Todos</option>

                  @foreach($operador as $op)
                  <option>{{$op->Nombre}}</option>
                  @endforeach

              </select>
            </div>
          </div>

          <div class="col-md-4">

          <div class="form-group">
          	<label for="FechaInicio">Fecha inicio</label>
          	<input type="date" name="FechaInicio" class="form-control">
          </div>

          </div>
          <div class="col-md-4">

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

      var NombreBien = document.getElementsByName("NombreBien")[0].value;
      var NombreCategoria = document.getElementsByName("NombreCategoria")[0].value;
      var Custodio = document.getElementsByName("Custodio")[0].value;
      var Operador = document.getElementsByName("Operador")[0].value;
      var FechaInicio = document.getElementsByName("FechaInicio")[0].value;
      var FechaFin = document.getElementsByName("FechaFin")[0].value;

      if (FechaInicio == ''){
        FechaInicio = '0';
      }
      if (FechaFin == ''){
        FechaFin = '0';
      }


      var datastr = "/" + NombreBien + "/" + NombreCategoria + "/" + Custodio +
                    "/" + Operador + "/" + FechaInicio + "/" + FechaFin;

      location.href ="/report/baja/getPDF"+datastr;

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

      var NombreBien = document.getElementsByName("NombreBien")[0].value;
      var NombreCategoria = document.getElementsByName("NombreCategoria")[0].value;
      var Custodio = document.getElementsByName("Custodio")[0].value;
      var Operador = document.getElementsByName("Operador")[0].value;
      var FechaInicio = document.getElementsByName("FechaInicio")[0].value;
      var FechaFin = document.getElementsByName("FechaFin")[0].value;

      var datastr = "NombreBien=" + NombreBien + "&NombreCategoria=" + NombreCategoria + "&Custodio=" + Custodio +
                    "&Operador=" + Operador + "&FechaInicio=" + FechaInicio + "&FechaFin=" + FechaFin;

      console.log(datastr);

      $.ajax({

        type: "get",
        url: "/report/baja/getInformation",
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
