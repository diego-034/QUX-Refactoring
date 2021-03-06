@extends('layouts.app')
@section('content')

    <!-- Maquetación de una tabla en la que se visualizan los productos a comprar -->

    <div class="" style="width: 1200px; margin: 4rem auto 7rem auto;">
        <div class="d-flex justify-content-between">
            <h1 class="mb-4">Carrito de compras</h1>
            <a href="/"><button type="button" class="btn btn-outline-danger">Volver</button></a>
        </div>
        <!-- Si ecuentra información la muestra en la tabla --> 
        @if($response != null)
            <div class="table-responsive">
                <table class="table table-responsive-lg table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio Unitario</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Recorremos $response en la posisión productos, 
                        lo añadimos a $product y mostramos su contenido -->
                        @foreach($response['products'] as $product)
                            <tr>
                                <th scope="row" class="d-flex align-items-center">
                                    <img style="width: 140px;height: 170px;" src="https://dafitistaticco-a.akamaihd.net/p/color-siete-1662-32463-1-product.jpg" class="card-img" alt="...">
                                    <div class="pl-4" style="line-height: 0;">
                                        <p style="text-transform: uppercase">{{ $product->name }}</p>
                                        <p style="text-transform: uppercase">(TALLA: {{ $product->size }})</p>
                                    </div> 
                                </th>
                                <td class="align-middle">{{ $product->price }}</td>
                                <td class="align-middle">{{ $product->quantity }}</td>   
                                <td class="align-middle">{{  $product->price * $product->quantity  }}</td>
                                <td class="align-middle">
                                    <svg style="cursor: pointer" width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-x-circle-fill text-danger" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                    </svg>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <!-- total a pagar y compra -->
                            <td class="table-dark" style="text-transform: uppercase; font-size: 17px;">Total</td>
                            <td class="table-dark"> ${{ $response['car'][0]->total }}</td>
                            <td class="table-dark" colspan="3">
                                <a href="{{ url('/registrar/carrito') }}" type="button" class="btn btn-outline-success">Comprar</a>
                            </td class="table-dark"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        @endif
    </div>
@endsection