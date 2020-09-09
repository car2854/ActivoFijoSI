@extends ('layouts.principal')
@section ('contenido')
  <div class="row">
    <div  class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <h3>Mantenimiento</h3>
      @if (count($errors)>0)
      <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        </ul>
      </div>
      @endif

      {!!Form::open(array('url'=>'RevisionTecnica/Mantenimiento','method'=>'POST','autocomplete'=>'off','route'=>array('route.name',$NroR)))!!}
      {{Form::token()}}

      <div class="form-group">
        <label for="Problema">Problema</label>
        <input type="text" name="Problema" class="form-control" placeholder="Problema...">
      </div>

      <div class="form-group">
        <label for="Solucion">Solucion</label>
        <input type="text" name="Solucion" class="form-control" placeholder="Solucion...">
      </div>
        
         

        <div class="form-group">
        	<label for="FechaInicio">Fecha inicio</label>
        	<input type="date" name="FechaInicio" class="form-control">
        </div>
        
        


         
        
        <div class="form-group">
        	<label for="FechaFinalizo">Fecha Fin</label>
        	<input type="date" name="FechaFinalizo" class="form-control">
        </div>
        
        
        
        
        <div class="form-group">
        <label for="HoraInicio">Hora Inicio</label>
        <div class="input-group">
          <div class="input-group-addon">
            <i class="glyphicon glyphicon-time"></i>
          </div>
          <input type="text" name="HoraInicio" class="form-control" placeholder="hh:mm:ss">
        </div>
      </div>

      <div class="form-group">
        <label for="HoraFinalizo">Hora Fin</label>
        <div class="input-group">
          <div class="input-group-addon">
            <i class="glyphicon glyphicon-time"></i>
          </div>
          <input type="text" name="HoraFinalizo" class="form-control" placeholder="hh:mm:ss">
        </div>
      </div>
        
        
        
      <div class="form-group">
        <label for="Duraccion">Duracion</label>
        <input type="text" name="Duraccion" class="form-control" placeholder="Duracion...">
      </div>

      <div class="form-group">
        <label for="Costo">Costo</label>
        <input type="text" name="Costo" class="form-control" placeholder="Costo...">

        <input type="text" name="NroRevision" class="form-control" value="{{$NroR}}" placeholder="Descripcion..." style="visibility:hidden">
      </div>

      <div class="form-group">
        <button class="btn btn-primary" type="submit">Guardar</button>
        <button class="btn btn-danger" type="reset">Cancelar</button>
      </div>

      {!!Form::close()!!}

    </div>
  </div>
@endsection
