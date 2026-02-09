@extends('plantilla')

@section('titulo', 'Login')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h1>Login</h1>

        @if (!empty($error))
        <div class="alert alert-danger">
            {{ $error }}
        </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="login" class="form-label">Login:</label>
                <input type="text" class="form-control" name="login" id="login" required />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" name="password" id="password" required />
            </div>
            <button type="submit" class="btn btn-dark w-100">Entrar</button>
        </form>
    </div>
</div>
@endsection
