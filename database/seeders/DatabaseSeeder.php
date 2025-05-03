<?php

namespace Database\Seeders;

use App\Models\Seguridad\Usuario;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Usuario::create([
            'usuarioImagen' => '',
            'usuarioAlias' => 'admin',
            'usuarioPassword' => md5('admin'),
            'usuarioNombre' => 'Administrador',
            'usuarioEmail' => 'carlosmateo484@gmail.com',
            'usuarioUltimaConexion' => now(),
            'usuarioConectado' => false,
            'usuarioCodigoRecuperacion' => '',
        ]);
    }
}
