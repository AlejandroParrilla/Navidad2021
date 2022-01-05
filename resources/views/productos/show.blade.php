<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.css">
<script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.8/dist/semantic.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    body{
        margin:40px;
    }
	#grafico{
		width:57%;
		margin-left:50px;
	}
	.inline{
		display:inline-block;
	}
</style>
<table class="ui orange table">
	<thead>
    <tr><th>ID</th><th>Nombre</th><th>Stock</th><th>Precio</th><th>Detalle</th><th>Código categoría</th></tr>
	</thead>
	<tbody>
		<tr>
            <td>{{$producto->id}}</td>
			<td>{{$producto->nombre}}</td>
			<td>{{$producto->stock}}</td>
			<td>{{$producto->precio}}</td>
			<td>{{$producto->detalle}}</td>
            <td>{{$producto->categoria_id}}</td>
        </tr>
	</tbody>	
</table>
<div>
	<div class='inline'>
	@if (isset($producto))
    <img src="{{asset('/storage/images/productos/'.$producto->image)}}" onerror="this.onerror=null; this.src='https://www.sinrumbofijo.com/wp-content/uploads/2016/05/default-placeholder.png'" alt="imagen" id="uploadPreview" style="width: 500px; height: 500px;"/> 
    @else 
    <img src="https://www.sinrumbofijo.com/wp-content/uploads/2016/05/default-placeholder.png" alt="imagen" id="uploadPreview" style="width: 500px; height: 500px;"/> 
    @endif
	</div>
	<div id='grafico' class='inline'>
		<canvas id="myChart"></canvas>
	</div>
</div>

<script>
  const labels = [
    'CREATUPC',
    'PCComponentes',
    'Amazon',
    'Ebay',
    'PcBox',
    'Electrón',
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'Comparativa de precios',
      backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
      data: [{{$producto->precio}},<?php echo rand($producto->precio*0.8, $producto->precio*2);?>,<?php echo rand($producto->precio*0.8, $producto->precio*1.5);?>, <?php echo rand($producto->precio*0.8, $producto->precio*2);?>, <?php echo rand($producto->precio*0.8, $producto->precio*1.3);?>, <?php echo rand($producto->precio*0.8, $producto->precio*2);?>, <?php echo rand($producto->precio*0.8, $producto->precio*2);?>],
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {}
  };
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
