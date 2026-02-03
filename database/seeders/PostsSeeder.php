<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = User::all();

        $usuarios->each(function($usuario) {
            Post::factory()->count(3)->create([
                'usuario_id' => $usuario->id
            ]);
        });
    }
}
