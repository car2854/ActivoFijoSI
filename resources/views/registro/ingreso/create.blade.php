@extends('layouts.principal')
@section('contenido')





<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1>Ingreso</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /# row -->
            <section id="main-content">

                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    @if (count($errors)>0)
                                    <div class="alert alert-danger">
                                        <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                        </ul>
                                    </div>
                                    @endif

                                    {!!Form::open(array('url'=>'adquisicion/adquisicion','method'=>'POST','autocomplete'=>'off'))!!}
                                    {{Form::token()}}
                                    <div class="row col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                                    <div class="form-group">
                                                            <label for="nroadquisicion">Nro de Ingreso</label>
                                                            <input type="text" name="nroadquisicion" class="form-control" placeholder="Numero de Ingreso...">
                                                    </div>
                                                </div>
                                            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                                <div class="form-group">
                                                    <label for="fecha">Fecha</label>
                                                    <input type="datetime" name="fecha" required value="{{date("Y-m-d")}}" class="form-control" placeholder="Nombre...">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                                <div class="form-group">
                                                    <label>Proveedor</label>
                                                        <select name="codproveedor" id="codproveedor" class="form-control">
                                                            @foreach ($proveedor as $pr)
                                                                <option value="{{$pr->CodProveedor}}">{{$pr->Nombre}}</option>
                                                            @endforeach
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Almacen</label>
                                                            <select name="nroalmacen" class="form-control">
                                                                @foreach ($almacen as $al)
                                                                    <option value="{{$al->NroAlmacen}}">{{$al->Direccion}}</option>
                                                                @endforeach
                                                            </select>
                                                    </div>
                                            </div>
                                    </div>



                                    <div class="row col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Categoria</label>
                                                <select name="pcodcategoria" id="pcodcategoria" class="form-control">
                                                    @foreach ($categoria as $cat)
                                                        <option value="{{$cat->CodCategoria}}">{{$cat->Nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                            <div class="form-group">
                                                <label >Cantidad</label>
                                                <input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder=" cantidad " >
                                        </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                            <div class="form-group">
                                                <label for="pprecio">Precio</label>
                                                <input type="number" id="pprecio" name="pprecio" class="form-control" placeholder=" precio ">
                                            </div>
                                        </div>
                                </div>

                                <br>
                                <div class="form-group col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary" id="bt_add"><i class="fa fa-plus-circle" aria-hidden="true"> Agregar</i></button>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                        <thead>
                                            <th>Opciones</th>
                                            <th>Categoria</th>
                                            <th>cantidad</th>
                                            <th>precio</th>
                                            <th>subtotal</th>
                                        </thead>
                                        <tfoot>
                                            <th>Total</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th><h4 id="total">S/0.00</h4></th>
                                        </tfoot>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>


                                <div class="row col-lg-12 col-sm-12 col-md-12 col-xs-12">

                                    <div class="form-group col-md-6" id="guardar">
                                        <input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
                                        <button type="submit"  class="btn btn-primary">Guardar</button>
                                        <button type="reset" class="btn btn-danger">Cancelar</button>
                                    </div>
                                </div>
                                {!!Form::close()!!}


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </div>
</div>


@push('scripts')
<script>
    $(document).ready(function(){
        $('#bt_add').click(function(){
            agregar();
        });
    });

    var cont=0;
    subtotal=[];
    total=0;
    $("#guardar").hide();
    limpiar();

    function agregar(){

        idcategoria=$("#pcodcategoria").val();

        categoria = $("#pcodcategoria option:selected").text();
        cantidad = $("#pcantidad").val();
        precio = $("#pprecio").val();

        if(idcategoria !="" && cantidad != "" && cantidad >0
        && precio != "" && precio > 0){

            subtotal[cont]= (cantidad*precio);
            total=total+subtotal[cont];

            var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+')">X</button></td><td><input type="hidden" name="codcategoria[]" value="'+idcategoria+'">'+categoria+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precio[]" value="'+precio+'"></td><td>'+subtotal[cont]+'</td></tr>';
            cont++;
            limpiar();
            document.getElementById('total').value = total;
            $("#total").html("Bs  "+total);
            evaluar();
            $("#detalles").append(fila);
        }


    }

    function eliminar(index){
        total=total-subtotal[index];
        $("#total").html("s/  "+ total);
        $("#fila" + index).remove();
        evaluar();
    }
    function limpiar(){
        $("#pcantidad").val("");
        $("#pprecio").val("");
    }
    function evaluar(){
        if(total > 0 ){
            $('#guardar').show();
        }else{
            $('#guardar').hide();
        }
    }
</script>
@endpush




@endsection
