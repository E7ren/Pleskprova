<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuariosProduccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear usuario efren con rol normal
        User::updateOrCreate(
            ['login' => 'efren'],
            [
                'password' => Hash::make('efren'),
                'rol' => 'usuario'
            ]
        );

        // Crear usuario admi con rol admin
        User::updateOrCreate(
            ['login' => 'admi'],
            [
                'password' => Hash::make('admin'),
                'rol' => 'admin'
            ]
        );
    }
}
