<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<table id="tabla" class="table">
	<thead>
		<tr class="table-success"><th>ID</th><th>Nombre</th><th>Apellidos</th><th>Dirección</th><th>Teléfono</th><th>Dni</th><th>Edad</th></tr>
	</thead>
	<tbody>
		@foreach($clientes as $cliente)
			<tr>
            <td>{{$cliente->id}}</td>
			<td>{{$cliente->nombre}}</td>
			<td>{{$cliente->apellidos}}</td>
			<td>{{$cliente->direccion}}</td>
			<td>{{$cliente->telefono}}</td>
			<td>{{$cliente->dni}}</td>
			<td>{{$cliente->edad()}}</td>
			</tr>
		@endforeach
	</tbody>
</table>