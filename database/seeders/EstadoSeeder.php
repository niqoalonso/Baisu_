<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Estado;

class EstadoSeeder extends Seeder
{

    public function run(): void
    {
        Estado::create([
            'nombre' => 'Activo',
        ]);

        Estado::create(  [
            'nombre' => 'Inactivo',
        ]);
    }
}
