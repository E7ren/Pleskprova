<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('titulo')->paginate(5);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        $posts = Post::orderBy('titulo')->paginate(5);
        return view('posts.index', compact('posts'));
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
