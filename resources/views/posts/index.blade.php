@extends('plantilla')

@section('titulo', 'Listado posts')

@section('contenido')
    <h1>Listado de posts</h1>
    
    <div class="row">
        <div class="col-md-12">
            @forelse ($posts as $post)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->titulo }}</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-primary btn-sm">Ver</a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline;">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este post?')">Borrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">No hay posts disponibles</div>
            @endforelse
            
            <div class="mt-3">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
