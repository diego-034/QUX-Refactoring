@extends('layouts.app')
@section('content')

    <!-- 
        Descripción detallada del producto.
        Elegir color, cantidad y añadir al carrito.
        $response es la información enviada a esta vista
    -->
    <div class="margenes" style="width: 1100px; margin: 4rem auto 7rem auto;">
        <div class="card mb-3" style="width: 1100px; height: 480px;">
            <div class="row no-gutters">
                <div class="col-md-4"> <!--https://dafitistaticco-a.akamaihd.net/p/color-siete-1662-32463-1-product.jpg -->
                    <img style="height: 478px;" src="https://dafitistaticco-a.akamaihd.net/p/color-siete-1662-32463-1-product.jpg" class="card-img" alt="...No se ha cargado la imagen....">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <!--Nombre, descripción y cuidados del producto-->
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-3" style="width: 100%;">
                                <h2>{{ $response->name }}</h2>
                                <a href="/productos"><button type="button" class="btn btn-outline-danger">Volver</button></a>
                            </div>
                            <h5 class="card-title">Descripción</h5>
                            <p class="card-text">{{ $response->description }}</p>
                        </div>
                        
                        <h5 class="card-title">Cuidados</h5>
                        <p class="card-text">
                            - No secar a plancha, si le cogio la tarde mire que va a hacer o pongase eso así mojado.
                            <br>
                            - Secar a la sombra.
                        </p>
                        <!-- formulario para añadir al carrito -->
                        <form action="/carrito" method="POST">
                            @csrf

                            <p>Color: {{ $response->color }}</p>
                            <input type="hidden" name="product_id" value="{{ $response->id }}">
                            <input class="mb-3 @error('quantity') is-invalid @enderror" type="number" name="quantity" id="quantity" required placeholder="Cantidad" min="0">
                            
                            <!-- Validación de errores -->
                            @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            <select class="" name="size" id="size" style="display: block;" required>
                                <option selected disabled>Seleccione una talla</option>
                                <option value="s"> S </option>
                                <option value="m"> M </option>
                                <option value="l"> L </option>
                                <option value="xl"> XL </option>
                            </select>
                            @error('size')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            
                            <div class="d-flex justify-content-between mt-4">
                                <p class="">Costo: ${{ $response->price }}</p>
                                <button type="submit" class="btn btn-success">Añadir al carrito</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
