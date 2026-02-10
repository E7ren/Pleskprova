@extends('plantilla')

@section('titulo', 'Inicio')

@section('contenido')
    <section class="bg-light p-4 p-md-5 rounded-4 shadow-sm">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <span class="badge rounded-pill text-bg-warning mb-3">Blog de clase</span>
                <h1 class="display-5 fw-bold">practica en Laravel</h1>
                <p class="lead text-muted">
                    En estes activitats de laravel hem apres a crear un llistat de post per a un blog amb control de acces.
                </p>
                <div class="d-flex flex-wrap gap-2 mt-3">
                    <a class="btn btn-primary btn-lg" href="{{ route('posts.index') }}" role="button">Ver Posts</a>
                    <a class="btn btn-outline-secondary btn-lg" href="{{ route('login') }}" role="button">Entrar</a>
                </div>
            </div>

    </section>
@endsection
