<!--Poner de la pagina base -->
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@extends('layouts.app')
    <!--Parte que se incluye  en la pagina base -->
    @section('content')
        <div class="jumbotron text-center">
            <div class="container">
                    <h1 class="display-4 text-white"><strong>Q-UX</strong></h1>
                    <p class="text-white"><strong>Diseña Tu Camisa</strong></p>
                @guest
                    <!-- Parte que ve el ususario no registrado -->
                    
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="/login"><button type="button" class="btn btn-outline-light">Iniciar Sesión</button></a>
                    </div>
                @else
                    <!-- 
                        Parte que ve el usuario registrado 
                        Botones que nos dirigiran a las distintas vistas    
                    -->
                    <h3 class="text-white">Bienvenido {{ Auth::user()->name }}</h3>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="/" class="mr-2"><button type="button" class="btn btn-outline-light">Productos</button></a>
                        <a href="/" class="mr-2"><button type="button" class="btn btn-outline-light">Pedidos</button></a>
                        <a href="{{ url('perfil') }}"><button type="button" class="btn btn-outline-light">Perfil</button></a>
                    </div>

                @endguest
            </div>
        </div>
    @endsection