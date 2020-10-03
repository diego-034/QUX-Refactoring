//Poner de la pagina base
@extends('layouts.app')
    //Parte que se incluye  en la pagina base
    @section('content')
        @guest
        //Parte que ve el ususario no registrado
            <h1>Home</h1>
        @else
        //Parte que ve el usuario registrado
            <h3>Home {{ Auth::user()->name }}</h3>

        @endguest
    @endsection