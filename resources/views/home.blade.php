<!--Poner de la pagina base -->
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@extends('layouts.app')
    <!--Parte que se incluye  en la pagina base -->
    @section('content')
        <!-- jumbotron -->
        <div class="jumbotron text-center">
            <div class="container">
                    <h1 class="display-4 text-white"><strong>Q-UX</strong></h1>
                    <p class="text-white"><strong>Diseña Tu Camisa</strong></p>
                @guest
                    <!-- Parte que ve el usuario no registrado -->
                    
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ url('login') }}" class="mr-2"><button type="button" class="btn btn-outline-light">Iniciar Sesión</button></a>
                        <a href="{{ url('productos') }}"><button type="button" class="btn btn-outline-light">Productos</button></a>
                    </div>
                @else
                    <!-- 
                        Parte que ve el usuario registrado.
                        Botones que nos dirigiran a las distintas vistas.    
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
        <!-- Fin jumbotron-->

        <!-- Sobre Nosotros -->
        <div class="about-us container">
            <h1 class="text-center" style="margin-top: 5rem;">Sobre Nosotros</h1>
            <hr>
            <div class="d-flex mt-5">
                <!-- descripción -->
                <p class="mr-5" style="font-size: 1.2rem;">
                    <strong> Lorem ipsum </strong> dolor sit amet consectetur adipisicing elit. Autem, dolores maiores ea possimus magni repellendus fugiat reprehenderit quod,
                    ipsum unde voluptates maxime animi molestiae beatae omnis quis sed officia sit?, Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam maiores consequuntur eius, mollitia minima magni quam dolores nobis. 
                    Impedit porro laboriosam provident sed alias enim, id corporis perferendis ab sapiente.
                </p>
                <!-- imagen corporativa -->
                <img src="{{ asset('images/q-ux.jpg') }}" alt="..." class="img-fluid" style="height: 23rem;">
            </div>
            <hr>
        </div>

    @endsection