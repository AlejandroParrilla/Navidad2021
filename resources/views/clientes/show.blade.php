<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.css">
<script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    body{
        margin:40px;
    }
	#productos{
        width:500px;
    }
    .inline{
      display:inline-block;
    }
</style>
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
      @foreach($cliente->envios as $envio)<td>@foreach($envio->productos as $producto){{$producto->precio}},@endforeach</td>@endforeach
    </tr>
    <tr>
      <td>Odor</td>
      <td>Not Much Usually</td>
    </tr>
  </tbody>
</table>
<h1> Pedidos </h1>
<table class="ui red table" id='productos'>
	<thead>
    <tr><th>Fecha</th><th>Cantidad</th><th>Artículo(s)</th><th>Pedidos totales</th></tr>
	</thead>
	<tbody>
		@foreach($cliente->envios as $envio)
		<tr>
      <td>{{$envio->fecha}}</td>
			<td>{{$envio->productos->count()}}</td>
			<td><ul>@foreach($envio->productos as $producto)<li>{{$producto->nombre}}</li>@endforeach</ul></td>
			<td>{{$productos->count()}}</td>
		</tr>
		@endforeach
	</tbody>	
</table>
<iframe
  width="600"
  title="titleww"
  height="450"
  style="border:0"
  loading="lazy"
  allowfullscreen
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyD0SW2MtTQxWagHti0tFCWgZ_O0NDvr5JU
	&q={{$cliente->direccion}}">
</iframe>
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


