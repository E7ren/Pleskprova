<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $fillable = ['nombre', 'apellidos', 'biografia', 'fecha_nacimiento'];

    public function libros()
    {
        return $this->hasMany(Libro::class);
    }
}
