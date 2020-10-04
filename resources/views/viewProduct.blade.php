@extends('layouts.app')
@section('content')

    <!-- 
        Descripción detallada del producto.
        Elegir color, canmtidad y añadir al carrito
    -->
    <div class="margenes" style="width: 1100px; margin: 4rem auto;">
        <div class="card mb-3" style="width: 1100px; height: 455px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img style="height: 450px;" src="https://dafitistaticco-a.akamaihd.net/p/color-siete-1662-32463-1-product.jpg" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Descripción</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural 
                        lead-in to additional content. This content is a little bit longer.</p>

                        <h5 class="card-title">Cuidados</h5>
                        <p class="card-text">
                            - No secar a plancha, si le cogio la tarde mire que va a hacer o pongase eso así mojado.
                            <br>
                            - Secar a la sombra.
                        </p>
                        <form action="">
                            <input class="mb-3" type="number" name="" id="" placeholder="cantidad" min="0">
                            <select name="" id="" style="display: block;">
                                <option selected disabled>Color</option>
                                <option value="ng"> Negro </option>
                                <option value="bl"> Blanco </option>
                                <option value="mr"> Marrón </option>
                            </select>
                            <select class="mt-3" name="" id="" style="display: block;">
                                <option selected disabled>Seleccione una talla</option>
                                <option value="s"> S </option>
                                <option value="m"> M </option>
                                <option value="l"> L </option>
                                <option value="xl"> XL </option>
                            </select>
                            <div class="d-flex justify-content-between mt-5">
                                <p class="">Costo: $25,000.00</p>
                                <button type="button" class="btn btn-success">Añadir al carrito</button>
                            </div>
                        </form>
                        
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
