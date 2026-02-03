@extends('plantilla')

@section('titulo', 'Ficha post')

@section('contenido')
    <div class="card">
        <div class="card-header">
            <h1>{{ $post->titulo }}</h1>
        </div>
        <div class="card-body">
            <h5 class="card-title">Contenido</h5>
            <p class="card-text">{{ $post->contenido }}</p>

            <hr>

            <p class="text-muted">
                <small>
                    <strong>Fecha de creación:</strong> {{ $post->created_at->format('d/m/Y H:i:s') }}
                </small>
            </p>

            <div class="d-flex gap-2">
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Volver al listado</a>

                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este post?')">Borrar post</button>
                </form>
            </div>
        </div>
    </div>
@endsection
