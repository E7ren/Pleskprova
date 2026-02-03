@extends('plantilla')

@section('titulo', 'Nuevo post')

@section('contenido')
    <h1>Nuevo post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="titulo">Título:</label>
            <input type="text" class="form-control" name="titulo" id="titulo" value="{{ old('titulo') }}">
            @if ($errors->has('titulo'))
                <div class="text-danger">
                    {{ $errors->first('titulo') }}
                </div>
            @endif
        </div>

        <div class="form-group mb-3">
            <label for="contenido">Contenido:</label>
            <textarea class="form-control" name="contenido" id="contenido" rows="10">{{ old('contenido') }}</textarea>
            @if ($errors->has('contenido'))
                <div class="text-danger">
                    {{ $errors->first('contenido') }}
                </div>
            @endif
        </div>

        <input type="submit" name="enviar" value="Crear post" class="btn btn-primary">
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
