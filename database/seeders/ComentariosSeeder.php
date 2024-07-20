<?php

namespace Database\Seeders;

use App\Models\Comentarios;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ComentariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comentarios::create([
            'id_usuario' => 1,
            'comentario' => 'Este es mi primer comentario en mi proyecto laravel.',
        ]);
        Comentarios::create([
            'id_usuario' => 1,
            'comentario' => 'Este es mi primer comentario en mi proyecto laravel.',
        ]);
    }
}
