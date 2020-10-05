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
<div class="container-xl" style="margin-bottom: 7rem; margin-top: 5rem;">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Gestion de <b>Productos</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="{{ url('crearProductos') }}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Agregar nuevo producto</span></a>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						
						<th>Nombre</th>
						<th>Descripción</th>
						<th>Color</th>
						<th>Precio</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($response as $product)
						<tr>
							<td>{{ $product->name }}</td>
							<td>{{ $product->description }}</td>
							<td>{{ $product->color }}</td>
							<td>{{ $product->price }}</td>
							<td>
								<a href="/productos/{{ $product->id }}" class="edit"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
								<button type="button"  class="delete" onclick="event.preventDefault();if(confirm('¿Estas Seguro?')){document.getElementById('delete-product{{ $product->id}}').submit();};">
									<i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i>
								</button>
								<form id="delete-product{{  $product->id}}" action="/productos/{{$product->id}}" method="POST" style="display: none;">
									@method('DELETE')
									<input name="comment_id" value="{{$product->id}}">
									@csrf
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<!-- <div class="clearfix">
				<div class="hint-text">Showing <b>0</b> out of <b>0</b> entries</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
			</div> -->
		</div>
	</div>        
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form >
				<div class="modal-header">						
					<h4 class="modal-title">Eliminar Producto</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>¿Estás seguro que quieres eliminar este producto?</p>
					<p class="text-warning"><small>Está acción no se puede deshacer.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
					<input type="submit" class="btn btn-danger" value="Eliminar">
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
