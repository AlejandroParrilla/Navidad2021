@extends("layouts.app2")


@section("contenido")

<h3>@if (isset($cliente)) Actualizar @else Insertar nuevo @endif cliente</h3>
<style>
  #nombre{
    width:550px;
  }
  #apellidos{
    width:550px;
  }
  #direccion{
    width:550px;
  }
  #telefono{
    width:250px;
  }
  .inline{
    display:inline-block;
  }
  #dni{
    width:250px;
    margin-left:50px;
  }
  #fecha_nac{
    width:550px;
  }
</style>
<form method="POST" action="{{isset($cliente)?route('clientes.update',[$cliente->id]):route('clientes.store')}}" enctype="multipart/form-data">
<div>
  <div class="form-group" id='nombre'>
    <label for="nombre">Nombre del cliente</label>
    <input type="text" class="form-control" name="nombre" value='{{$cliente->nombre??old("nombre")}}'> 
  </div>
  <div class="form-group" id='apellidos'>
    <label for="apellidos">Apellidos</label>
    <input type="text" class="form-control" name="apellidos"  value='{{$cliente->apellidos??''}}'>
  </div>
  <div class="form-group" id='direccion'>
    <label for="direccion">Dirección</label>
    <input type="text" class="form-control" name="direccion"  value='{{$cliente->direccion??''}}'>
  </div>
  <div class="form-group inline" id='telefono'>
    <label for="telefono">Teléfono</label>
    <input type="text" class="form-control" name="telefono"  value='{{$cliente->telefono??''}}'>
  </div>
  <div class="form-group inline" id='dni'>
    <label for="dni">Dni</label>
    <input type="text" class="form-control" name="dni"  value='{{$cliente->dni??''}}'>
  </div>
  <div class="form-group" id='fecha_nac'>
    <label for="fecha_nac">Fecha Nacimiento</label>
    <input type="date" class="form-control" name="fecha_nac"  value='{{$cliente->fecha_nac??''}}'>
  </div>
</div>
	@csrf
	
	@if (isset($cliente))
		<input type="hidden" name="_method" value="PUT">
	@endif

  <div class="ui buttons">
    <button type="submit" class="ui positive button">{{isset($cliente)? 'Actualizar':'Insertar'}}</button>
    <div class="or"></div>
    <a href="{{route('clientes.index')}}" class="ui negative button">Volver</a>
  </div>
</form>
@endsection