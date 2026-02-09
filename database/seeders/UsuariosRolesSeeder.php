<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuariosRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear usuario admin
        $admin = User::create([
            'login' => 'admin',
            'password' => bcrypt('admin'),
            'rol' => 'admin'
        ]);

        // Crear posts para el admin
        Post::create([
            'titulo' => 'Bienvenidos al Blog',
            'contenido' => 'Este es el primer post del blog. ¡Esperamos que disfrutes del contenido!',
            'usuario_id' => $admin->id
        ]);

        Post::create([
            'titulo' => 'Normas de la comunidad',
            'contenido' => 'Por favor, sé respetuoso con los demás usuarios y sigue las normas del blog.',
            'usuario_id' => $admin->id
        ]);

        // Crear usuarios normales
        $usuario1 = User::create([
            'login' => 'maria',
            'password' => bcrypt('maria'),
            'rol' => 'usuario'
        ]);

        Post::create([
            'titulo' => 'Mi primera experiencia con Laravel',
            'contenido' => 'Hoy he empezado a aprender Laravel y me está encantando. Es un framework muy potente.',
            'usuario_id' => $usuario1->id
        ]);

        Post::create([
            'titulo' => 'Consejos para principiantes',
            'contenido' => 'Si estás empezando con Laravel, te recomiendo leer la documentación oficial.',
            'usuario_id' => $usuario1->id
        ]);

        $usuario2 = User::create([
            'login' => 'juan',
            'password' => bcrypt('juan'),
            'rol' => 'usuario'
        ]);

        Post::create([
            'titulo' => 'Aventuras en programación',
            'contenido' => 'Cada día aprendo algo nuevo sobre desarrollo web. Hoy he descubierto las migraciones.',
            'usuario_id' => $usuario2->id
        ]);

        Post::create([
            'titulo' => 'Proyecto personal',
            'contenido' => 'Estoy desarrollando mi primer proyecto web completo con Laravel. ¡Muy emocionante!',
            'usuario_id' => $usuario2->id
        ]);

        $usuario3 = User::create([
            'login' => 'ana',
            'password' => bcrypt('ana'),
            'rol' => 'usuario'
        ]);

        Post::create([
            'titulo' => 'Aprendiendo cada día',
            'contenido' => 'La programación es un viaje increíble. Cada desafío superado es una victoria.',
            'usuario_id' => $usuario3->id
        ]);
    }
}
