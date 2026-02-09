@extends('plantilla')

@section('titulo', 'Editar post')

@section('contenido')
    <h1>Editar post</h1>

    <form action="{{ route('posts.update', $post) }}" method="POST">
        @method('PUT')
        @csrf

        <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" class="form-control @error('titulo') is-invalid @enderror"
                   name="titulo" id="titulo" value="{{ old('titulo', $post->titulo) }}" required>
            @error('titulo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="contenido" class="form-label">Contenido:</label>
            <textarea class="form-control @error('contenido') is-invalid @enderror"
                      name="contenido" id="contenido" rows="5" required>{{ old('contenido', $post->contenido) }}</textarea>
            @error('contenido')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
