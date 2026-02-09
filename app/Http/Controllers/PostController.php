<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('usuario')->orderBy('titulo')->paginate(5);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->titulo = $request->get('titulo');
        $post->contenido = $request->get('contenido');

        // Asignar el usuario autenticado
        $post->usuario()->associate(Auth::user());

        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);

        // Los admin pueden editar cualquier post, los usuarios normales solo los suyos
        if (!Auth::user()->esAdmin() && $post->usuario_id != Auth::id()) {
            abort(403, 'No tienes permiso para editar este post');
        }

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        // Los admin pueden modificar cualquier post, los usuarios normales solo los suyos
        if (!Auth::user()->esAdmin() && $post->usuario_id != Auth::id()) {
            abort(403, 'No tienes permiso para modificar este post');
        }

        $post->titulo = $request->get('titulo');
        $post->contenido = $request->get('contenido');
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        // Los admin pueden eliminar cualquier post, los usuarios normales solo los suyos
        if (!Auth::user()->esAdmin() && $post->usuario_id != Auth::id()) {
            abort(403, 'No tienes permiso para eliminar este post');
        }

        $post->delete();

        return redirect()->route('posts.index');
    }

    /**
     * Método temporal para crear posts de prueba
     */
    public function nuevoPrueba()
    {
        $numero = rand(1, 1000);
        $post = new Post();
        $post->titulo = "Título " . $numero;
        $post->contenido = "Contenido " . $numero;
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Método temporal para editar posts de prueba
     */
    public function editarPrueba($id)
    {
        $numero = rand(1, 1000);
        $post = Post::findOrFail($id);
        $post->titulo = "Título " . $numero;
        $post->contenido = "Contenido " . $numero;
        $post->save();

        return redirect()->route('posts.index');
    }
}
