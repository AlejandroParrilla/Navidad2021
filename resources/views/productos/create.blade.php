@extends("layouts.app2")


@section("contenido")

<h3>@if (isset($producto)) Actualizar @else Insertar nuevo @endif producto</h3> <!-- $proveedore es una variable de la url -->
<style>
  #nombre{
    width:550px;
  }
  #precio{
    width:250px;
    margin-right:50px;
  }
  #stock{
    width:250px;
  }
  .inline{
    display:inline-block;
  }
  #detalle{
    width:550px;
  }
  #categoria{
    width:250px;
    margin-right:50px;
  }
  #impuesto{
    width:250px;
  }
  input{
    word-break: break-word;
}
 .foto{
   margin-left:40px;
 }
 .btn_foto{
   margin-top:15px;
 }
</style>
<form method="POST" action="{{isset($producto)?route('productos.update',[$producto->id]):route('productos.store')}}" enctype="multipart/form-data">
<div class='inline'>
  <div class="form-group" id='nombre'>
    <label for="nombre">Nombre del producto</label>
    <input type="text" class="form-control" name="nombre" value='{{$producto->nombre??old("nombre")}}'> <!-- name y for tiene que ser igual al campo de la base de datos -->
  </div>
  <div class="form-group inline" id='precio'>
    <label for="precio">Precio (€)</label>
    <input type="number" class="form-control" name="precio"  value='{{$producto->precio??''}}'>
  </div>
  <div class="form-group inline" id='stock'>
    <label for="stock">Stock (Unidades)</label>
    <input type="number" class="form-control" name="stock"  value='{{$producto->stock??''}}'>
  </div>
  <div class="form-group" id='detalle'>
    <label for="detalle">Detalle</label>
    <input type="text" class="form-control" name="detalle"  value='{{$producto->detalle??''}}'>
  </div>
  <div class="form-group inline" id='categoria'>
    <label for="categoria_id">Categoria asociada</label>
    <select style="width: 100%" id="categoria_id" class="form-control select2" name="categoria_id">
        @foreach($categorias as $categoria)
          <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
        @endforeach
      </select>
  </div>
  <div class="form-group inline" id='impuesto'>
    <label for="igic">Impuesto (%)</label>
    <input type="number" class="form-control" name="igic" value='{{$producto->igic??''}}'>
  </div>
</div>
<div class='form-group" foto inline'>
    <div>
    @if (isset($producto))
    <img src="{{asset('/storage/images/productos/'.$producto->image)}}" onerror="this.onerror=null; this.src='https://www.sinrumbofijo.com/wp-content/uploads/2016/05/default-placeholder.png'" alt="imagen" id="uploadPreview" style="width: 288px; height: 288px;"/> 
    @else 
    <img src="https://www.sinrumbofijo.com/wp-content/uploads/2016/05/default-placeholder.png" alt="imagen" id="uploadPreview" style="width: 288px; height: 288px;"/> 
    @endif   
    </div>
    <div class='btn_foto' id='image'>
      <input class="form-control" id="uploadImage" type="file" name="image" value="{{$producto->image??''}}" accept=".jpg,.jpeg,.png" onchange="PreviewImage();" />
    </div>
</div>
	@csrf
	
	@if (isset($producto))
		<input type="hidden" name="_method" value="PUT">
	@endif

  <div class="ui buttons">
    <button type="submit" class="ui positive button">{{isset($producto)? 'Actualizar':'Insertar'}}</button>
    <div class="or"></div>
    <a href="{{route('productos.index')}}" class="ui negative button">Volver</a>
  </div>
</form>
<script type="text/javascript">

    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>

@endsection