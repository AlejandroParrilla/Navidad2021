@extends('layouts.app2')
@section("contenido")
<a href="{{route('productos.create')}}" class="ui inverted primary button" style='margin-bottom:10px'><i class="plus icon"></i>Productos</a>
<a href="{{route('productos.pdf')}}" class="ui inverted orange button"><i class="file pdf icon"></i>Generar PDF</a>
<h1>Productos</h1>
<table id="tabla" class="ui olive table">
	<thead>
		<tr><th>ID</th><th>Nombre</th><th>Stock</th><th>Precio</th><th>Detalle</th><th>Código categoría</th><th></th><th></th><th></th><th></th></tr>
	</thead>
	<tbody>
	@foreach($productos as $producto)
		<tr data-id="{{$producto->id}}">
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
                    <a class="ui red label">1</a>
                    <img width="35px" src="https://cdn-icons-png.flaticon.com/512/1947/1947308.png">
                    <?php
                    break;
                case 2:
                    ?>
                    <a class="ui red label">2</a>
                    <img width="35px" src="https://cdn0.iconfinder.com/data/icons/mobile-phone-componets-1/144/mobile-icon_05-512.png">
                    <?php
                    break;
                case 3:
                    ?>
                    <a class="ui red label">3</a>
                    <img width="35px" src="https://cdn-icons-png.flaticon.com/512/100/100310.png">
                    <?php
                    break;
                case 4:
                    ?>
                    <a class="ui red label">4</a>
                    <img width="35px" src="https://cdn.iconscout.com/icon/premium/png-256-thumb/motherboard-1825189-1547772.png">
                    <?php
                    break;
                case 5:
                    ?>
                    <a class="ui red label">5</a>
                    <img width="35px" src="https://cdn2.iconfinder.com/data/icons/electronics-solid-icons-vol-1/48/033-512.png">
                    <?php
                    break;
                case 6:
                    ?>
                    <a class="ui red label">6</a>
                    <img width="35px" src="https://cdn0.iconfinder.com/data/icons/pc-hardware-2/128/PC_Hardware_Set_Artboard_15-512.png">
                    <?php
                    break;
                case 7:
                    ?>
                    <a class="ui red label">7</a>
                    <img width="35px" src="https://cdn0.iconfinder.com/data/icons/technology-icons-3/1052/computer_box-512.png">
                    <?php
                    break;
            }
            ?>
            </td>
            <td><a href='{{url("productos/$producto->id")}}'><img class='btn_mostrar' width="32px" src="https://cdn-icons-png.flaticon.com/512/1472/1472457.png"></a></td>
            <td><a href='{{url("productos/$producto->id/edit")}}'><img class='btn_editar' width="28px" src="https://images.squarespace-cdn.com/content/v1/5cf53269b251530001a68133/1565187979811-I64YEN86F8QBIB7KFASX/design_icon_wht_sm.png"></a></td>
		    <td><a href='{{url("productos/qr")}}/{{$producto->id}}'><img class='btn_qr' width="25px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/QR_icon.svg/1024px-QR_icon.svg.png"></a></td>
            <td><img class='btn_borrar' width="26px" src="https://cdn2.iconfinder.com/data/icons/designers-and-developers-icon-set/32/recyclebin-512.png"></td>
		</tr>
	@endforeach
	</tbody>	
</table>

<script>
	$(document).ready(function(){
		$("#tabla").DataTable({
			language: { url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json" },
		});
		
		$(".btn_borrar").click(function(){
			const $tr=$(this).closest("tr");
			const id=$tr.data("id");	
			Swal.fire({
			  title: '¿Estás seguro que quieres borrar este producto?',
			  icon: 'question',
			  showCancelButton: true,
			  confirmButtonColor: '#d33',
			  cancelButtonColor: '#3085d6',
			  confirmButtonText: 'Borrar',
			  cancelButtonText: 'Cancelar',
			}).then((result) => {
			  if (result.isConfirmed) {
				$.ajax({
					method  : "POST",
					url		: "{{url('/productos')}}/"+id,
					data    : {
						_method    : 'DELETE',
						_token  : "{{csrf_token()}}", 
					},
					success : function() {
						$tr.fadeOut()
					} 
				})	  
		      }
			})				
		});
	});
</script>
@endsection
