<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title'   => 'Mi primer post',
                'content' => 'Bienvenido al mini blog construido con CodeIgniter 4 y Vue.js.',
                'author'  => 'Admin',
            ],
            [
                'title'   => '¿Por qué usar Docker?',
                'content' => 'Docker nos permite tener el mismo entorno en cualquier máquina sin instalar nada extra.',
                'author'  => 'Admin',
            ],
            [
                'title'   => 'CodeIgniter vs Laravel',
                'content' => 'CodeIgniter es más liviano y simple. Laravel tiene más funcionalidades pero mayor curva de aprendizaje.',
                'author'  => 'Admin',
            ],
        ];

        $this->db->table('posts')->insertBatch($data);
    }
}