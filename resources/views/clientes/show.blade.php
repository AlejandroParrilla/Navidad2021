<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.css">
<script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<style>
    body{
        margin:40px;
    }
    .inline{
      display:inline-block;
    }
</style>
<body onload="precio(); cantidad();">
  <h4 class="ui horizontal divider header">
    <i class="bar chart icon"></i>
    Datos del cliente
  </h4>
  <table class="ui definition table">
    <tbody>
      <tr>
        <td class="two wide column">Cliente desde</td>
        <td>{{$cliente->created_at}}</td>
      </tr>
      <tr>
        <td>Información personal</td>
        <td>
        <i class="user icon"></i>{{$cliente->nombre}}&nbsp;
        {{$cliente->apellidos}} &emsp;&emsp;
        <i class="phone volume icon"></i>{{$cliente->telefono}}&emsp;&emsp;
        <i class="map marker alternate icon"></i>{{$cliente->direccion}}&emsp;&emsp;
        <i class="address card icon"></i>{{$cliente->dni}}&emsp;&emsp;
        <i class="birthday cake icon"></i>{{$cliente->edad()}} años
      </td>
      </tr>
      <tr>
        <td>Artículos comprados</td>
        <td id='precios'></td>
        <!--@foreach($cliente->envios as $envio)<td>@foreach($envio->productos as $producto){{$producto->precio}},@endforeach</td>@endforeach-->
      </tr>
      <tr>
        <td>Total comprado CREATUPC</td>
        <td id='cantidad'>
          <div class="progress">
            <div id='barra' class="progress-bar bg-success" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
          </div>  
        </td>
      </tr>
    </tbody>
  </table>
  <h1> Pedidos </h1>
  <table class="ui red table" id='productos'>
    <thead>
      <tr><th>Fecha</th><th>Cantidad</th><th>Artículo(s)</th></tr>
    </thead>
    <tbody>
      @foreach($cliente->envios as $envio)
      <tr>
        <td>{{$envio->fecha}}</td>
        <td>{{$envio->productos->count()}}</td>
        <td><ul>@foreach($envio->productos as $producto)<li>{{$producto->nombre}}</li>@endforeach</ul></td>
      </tr>
      @endforeach
    </tbody>	
    </table>
</body>
<script>
function precio() {
  suma=0;
  @foreach($cliente->envios as $envio)
    @foreach($envio->productos as $producto)
      suma+={{$producto->precio}};
    @endforeach
  @endforeach
  document.getElementById("precios").innerHTML=suma+' €';
}
function cantidad() {
  suma=0;
  total=0;
  @foreach($cliente->envios as $envio)
      suma+={{$envio->productos->count()}};
      total={{$productos->count()}};
  @endforeach
  porcentaje=suma/total*100;
  document.getElementById("barra").style.width = porcentaje+'%';
  document.getElementById("barra").innerHTML=porcentaje.toFixed(2)+'%';
  document.getElementById("cantidad").innerHTML+=suma+' artículos';
}
</script>
<?php
        $address = $cliente->direccion; 
        $apiKey = 'api-key'; // Google maps now requires an API key.
        // Get JSON results from this request
        $geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false&key='.$apiKey);
        $geo = json_decode($geo, true); // Convert the JSON to an array

        if (isset($geo['status']) && ($geo['status'] == 'OK')) {
          $latitude = $geo['results'][0]['geometry']['location']['lat']; // Latitude
          $longitude = $geo['results'][0]['geometry']['location']['lng']; // Longitude
          echo $latitude;
          echo 'holaaaa';
}
?>

