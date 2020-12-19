@extends('layouts.principal')
@section('contenido')


        <h3>Activos Fijos</h3>
        <!-- /.box-header -->




        <div class="row col-md-12">
          <div class="col-md-4">
            <div class="form-group">
              <label for="NombreBien">Nombre Bien</label>
              <select name="NombreBien" class="form-control selectpicker" style="width: 100%;">
                <option selected="selected">Todos</option>
                @foreach($NombreBien as $nombrebien)
                  <option value={{$nombrebien->Nombre}}>{{$nombrebien->Nombre}}</option>\
                @endforeach
              </select>
            </div>
          </div>



          <div class="col-md-4">
            <!-- /.form-group -->
            <div class="form-group">
              <label for="NombreCustodio">Categoria</label>
              <select name="NombreCategoria" class="form-control selectpicker" style="width: 100%;">
                <option selected="selected">Todos</option>
                @foreach($NombreCategoria as $nombrecategoria)
                  <option>{{$nombrecategoria->Nombre}}</option>
                @endforeach
              </select>
            </div>
            <!-- /.form-group -->

          </div>

          <div class="col-md-4">
            <!-- /.form-group -->
            <div class="form-group">
              <label for="Departamento">Departamento</label>
              <select name="Departamento" class="form-control selectpicker" style="width: 100%;">
                <option selected="selected">Todos</option>
                @foreach($Departamento as $departamento)
                  <option>{{$departamento->Descripcion}}</option>
                @endforeach
              </select>
            </div>
            <!-- /.form-group -->

          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
              <div class="form-group">
              	<label for="ValorCompraInicial">Valor Compra Inicial</label>
              	<input type="number" name="ValorCompraInicial" class="form-control" placeholder="Valor de Compra final...">
              </div>
          </div>

          <div class="col-md-3">
              <div class="form-group">
              	<label for="ValorCompraFinal">Valor Compra Final</label>
              	<input type="number" name="ValorCompraFinal" class="form-control" placeholder="Valor de Compra inicial...">
              </div>
          </div>

           <div class="col-md-3">
            <div class="form-group">
            	<label for="FechaInicio">Fecha inicio</label>
            	<input type="date" name="FechaInicio" class="form-control">
            </div>
          </div>

          <div class="col-md-3">

            <div class="form-group">
            	<label for="FechaFin">Fecha fin</label>
            	<input type="date" name="FechaFin" class="form-control">
            </div>

          </div>

        </div>


        <span class="input-group-btn">
          <a type="submit" class="btn btn-primary" onclick="buscar()" style="color:#FFFFFF">Buscar</a>
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
      var Departamento = document.getElementsByName("Departamento")[0].value;
      var ValorCompraInicial = document.getElementsByName("ValorCompraInicial")[0].value;
      var ValorCompraFinal = document.getElementsByName("ValorCompraFinal")[0].value;
      var FechaInicio = document.getElementsByName("FechaInicio")[0].value;
      var FechaFin = document.getElementsByName("FechaFin")[0].value;


      if (ValorCompraInicial == ''){
        ValorCompraInicial = '0';
      }
      if (ValorCompraFinal == ''){
        ValorCompraFinal = '0';
      }
      if (FechaInicio == ''){
        FechaInicio = '0';
      }
      if (FechaFin == ''){
        FechaFin = '0';
      }

      var datastr = "/" + NombreBien + "/" + NombreCategoria + "/" + Departamento +
                    "/" + ValorCompraInicial + "/" + ValorCompraFinal + "/" + FechaInicio + "/" + FechaFin;

      location.href ="/report/activoFijo/getPDF"+datastr;

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
      var Departamento = document.getElementsByName("Departamento")[0].value;
      var ValorCompraInicial = document.getElementsByName("ValorCompraInicial")[0].value;
      var ValorCompraFinal = document.getElementsByName("ValorCompraFinal")[0].value;
      var FechaInicio = document.getElementsByName("FechaInicio")[0].value;
      var FechaFin = document.getElementsByName("FechaFin")[0].value;

      var datastr = "NombreBien=" + NombreBien + "&NombreCategoria=" + NombreCategoria + "&Departamento=" + Departamento +
                    "&ValorCompraInicial=" + ValorCompraInicial + "&ValorCompraFinal=" + ValorCompraFinal + "&FechaInicio=" + FechaInicio + "&FechaFin=" + FechaFin;


      $.ajax({

        type: "get",
        url: "/report/activoFijo/getInformation",
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
