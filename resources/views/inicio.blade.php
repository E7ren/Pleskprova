@extends('plantilla')

@section('titulo', 'Inicio')

@section('contenido')
    <div class="jumbotron mt-4">
        <h1 class="display-4">¡Bienvenido al Blog!</h1>
        <p class="lead">Esta es la página de inicio del blog creado con Laravel.</p>
        <hr class="my-4">
        <p>Explora los posts disponibles navegando por el menú superior.</p>
        <a class="btn btn-primary btn-lg" href="{{ route('posts.index') }}" role="button">Ver Posts</a>
    </div>
@endsection
