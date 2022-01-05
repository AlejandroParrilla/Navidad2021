<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<table id="tabla" class="table">
	<thead>
		<tr class="table-success"><th>ID</th><th>Nombre</th><th>Stock</th><th>Precio</th><th>Detalle</th><th>Código categoría</th></tr>
	</thead>
	<tbody>
		@foreach($productos as $producto)
			<tr>
            <td>{{$producto->id}}</td>
			<td>{{$producto->nombre}}</td>
			<td>{{$producto->stock}}</td>
			<td>{{$producto->precio}}</td>
			<td>{{$producto->detalle}}</td>
            <td>
            <?php
            switch ($producto->categoria_id) {
                case 1:
                    ?>
                    <a class="btn btn-danger">1</a>
                    <img width="35px" src="https://cdn-icons-png.flaticon.com/512/1947/1947308.png">
                    <?php
                    break;
                case 2:
                    ?>
                    <a class="btn btn-danger">2</a>
                    <img width="35px" src="https://cdn0.iconfinder.com/data/icons/mobile-phone-componets-1/144/mobile-icon_05-512.png">
                    <?php
                    break;
                case 3:
                    ?>
                    <a class="btn btn-danger">3</a>
                    <img width="35px" src="https://cdn-icons-png.flaticon.com/512/100/100310.png">
                    <?php
                    break;
                case 4:
                    ?>
                    <a class="btn btn-danger">4</a>
                    <img width="35px" src="https://cdn.iconscout.com/icon/premium/png-256-thumb/motherboard-1825189-1547772.png">
                    <?php
                    break;
                case 5:
                    ?>
                    <a class="btn btn-danger">5</a>
                    <img width="35px" src="https://cdn2.iconfinder.com/data/icons/electronics-solid-icons-vol-1/48/033-512.png">
                    <?php
                    break;
                case 6:
                    ?>
                    <a class="btn btn-danger">6</a>
                    <img width="35px" src="https://cdn0.iconfinder.com/data/icons/pc-hardware-2/128/PC_Hardware_Set_Artboard_15-512.png">
                    <?php
                    break;
                case 7:
                    ?>
                    <a class="btn btn-danger">7</a>
                    <img width="35px" src="https://cdn0.iconfinder.com/data/icons/technology-icons-3/1052/computer_box-512.png">
                    <?php
                    break;
            }
            ?>
            </td>
			</tr>
		@endforeach
	</tbody>
</table>