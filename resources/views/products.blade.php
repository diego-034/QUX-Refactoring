@extends('layouts.app')
@section('content')
    
    <!--
        contenido de la vista de todos los productos de la base de datos
    -->

    <div class="margenes" style="width: 1100px; margin: 4rem auto;">
        <h1 style="text-transform: uppercase;" class="text-center">Productos</h1>
        <br>
        <div class="card-columns text-center">
            <div class="card">
                <img src="https://dafitistaticco-a.akamaihd.net/p/color-siete-1662-32463-1-product.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Nombre: product.Nombre</h5>
                    <h5 class="card-title">Color:  product.Color</h5>
                    <h5 class="card-title">Precio : $ product.Precio</h5>

                    <a href="#" class="btn btn-outline-success btn-block">Ver</a>
                </div>
            </div>
        </div>
    </div>  
@endsection