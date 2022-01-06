@extends('layouts.app2')
@section("contenido")
<a href="{{route('clientes.create')}}" class="ui inverted primary button" style='margin-bottom:10px'><i class="plus icon"></i>clientes</a>
<a href="{{route('clientes.pdf')}}" class="ui inverted orange button"><i class="file pdf icon"></i>Generar PDF</a>
<h1>Clientes</h1>
<table id="tabla" class="ui olive table">
	<thead>
		<tr><th>ID</th><th>Nombre</th><th>Apellidos</th><th>Direccion</th><th>Telefono</th><th>Dni</th><th>Fecha nacimiento</th><th>Edad</th><th></th><th></th><th></th><th></th><th></th></tr>
	</thead>
	<tbody>
	@foreach($clientes as $cliente)
		<tr data-id="{{$cliente->id}}">
			<td>{{$cliente->id}}</td>
			<td class='show_productos'>{{$cliente->nombre}}</td>
			<td>{{$cliente->apellidos}}</td>
			<td>{{$cliente->direccion}}</td>
			<td>{{$cliente->telefono}}</td>
			<td>{{$cliente->dni}}</td>
			<td>{{$cliente->fecha_nac}}</td>
			<td>{{$cliente->edad()}}</td>
            <td><a href='{{url("clientes/$cliente->id")}}'><img class='btn_mostrar' width="32px" src="https://cdn-icons-png.flaticon.com/512/1472/1472457.png"></a></td>
            <td><a href='{{url("clientes/$cliente->id/edit")}}'><img class='btn_editar' width="28px" src="https://images.squarespace-cdn.com/content/v1/5cf53269b251530001a68133/1565187979811-I64YEN86F8QBIB7KFASX/design_icon_wht_sm.png"></a></td>
		    <td><a href='{{url("clientes/qr")}}/{{$cliente->id}}'><img class='btn_qr' width="25px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/QR_icon.svg/1024px-QR_icon.svg.png"></a></td>
			<td><a href='{{url("clientes/email")}}/{{$cliente->id}}'><img class='btn_email' width="25px" src="https://nutripur.com/wp-content/uploads/2019/08/email-logo.png"></a></td>
            <td><img class='btn_borrar' width="26px" src="https://cdn2.iconfinder.com/data/icons/designers-and-developers-icon-set/32/recyclebin-512.png"></td>
		</tr>
	@endforeach
	</tbody>	
</table>

<div class="modal fade" id="productos_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Productos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="modal_body_examenes" class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<script>
	$(document).ready(function(){
		
		$("#tabla").DataTable({
			language: { url: "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json" },
		});
		
		$(".btn_borrar").click(function(){
			const $tr=$(this).closest("tr");
			const id=$tr.data("id");	
			Swal.fire({
			  title: '¿Estás seguro que quieres borrar este cliente?',
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
					url		: "{{url('/clientes')}}/"+id,
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
		$("body").on("click",".show_productos", function(e){
            e.preventDefault();
            const clienteid=$(this).closest("tr").data("id");
            $.ajax({
                url    : "{{url('/envios/listado')}}/"+clienteid,
                success: function(datos){
                    let htmlTable="<table class='table table-bordered table-striped'>";
                    htmlTable+="<tr><th>Fecha</th></tr>"
                    $("#modal_body_examenes").html("");
                    for(let i=0;i<datos.length;i++){
                        htmlTable+=`<tr><td>${datos[i].fecha}</td></tr>`;
                    }
                    htmlTable+="</table>";
                    $("#modal_body_examenes").append(htmlTable);
                    $("#productos_modal").modal();
					console.log(htmlTable)
                }
            });
        });
	});
</script>
@endsection
