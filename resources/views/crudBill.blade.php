<link href="{{ asset('css/crudProduct.css') }}" rel="stylesheet">
@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
<script>
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>
<div class="container-xl" style="margin: 4rem auto 7rem auto;">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Gestion de <b>Facturas</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="{{ url('crearFactura') }}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Agregar Factura</span></a>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Total</th>
						<th>Descuento total</th>
						<th>Total IVA</th>
						<th>Estado</th>
						<th>Cliente</th>
						<th>Usuario</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
				 <!-- $response trae la información del producto, con $product la mostramos -->
				@foreach($response as $product)
					<tr>
						<td>{{ $product->total }}</td>
						<td>{{ $product->total_discount }}</td>
						<td>{{ $product->total_iva }}</td>
						<td>{{ $product->state }}</td>
						<td>{{ $product->client_id }}</td>
						<td>{{ $product->user_id }}</td>
						<td>
							<a href="/facturas/{{ $product->id }}" class="edit" ><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
							<button type="button"  class="delete" onclick="event.preventDefault();if(confirm('¿Estas Seguro?')){document.getElementById('delete-product{{ $product->id}}').submit();};">
								<i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i>
							</button>
							<!-- Eliminamos un producto por id -->
							<form id="delete-product{{  $product->id}}" action="/facturas/{{$product->id}}" method="POST" style="display: none;">
								@method('DELETE')
								<input name="comment_id" value="{{$product->id}}">
								@csrf
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>        
</div>
@endsection
