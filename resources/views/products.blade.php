@extends('layouts.app')
@section('content')
    
    <!-- contenido de la vista de todos los productos de la base de datos -->
    <h1 class="text-center" style="text-transform: uppercase; margin-top: 4rem">Productos</h1>
    <div class="d-flex" style="width: 1100px; margin: 4rem auto;">
        <br>
        <div class="card-columns" > 
            <!-- recorremos $response que es la información que se nos esta enviando
            y  la añadimos a product -->  
            @foreach($response as $product)
            <div class="card" style="border: 1px solid #e1e1e1;">
                <img src="https://dafitistaticco-a.akamaihd.net/p/color-siete-1662-32463-1-product.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Nombre: {{ $product->name }}</h5>
                    <h5 class="card-title">Color : {{ $product->color }}</h5>
                    <h5 class="card-title">Precio: ${{ $product->price }}</h5>
                    <a href="/productos/{{ $product->id }}" class="btn btn-outline-success btn-block">Ver</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>  
@endsection