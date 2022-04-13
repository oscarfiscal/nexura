<?php

namespace Database\Seeders;

use App\Models\Rol;
use App\Models\Area;
use App\Models\Employe;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        Area::factory()->create([
            'nombre' => 'Administrativa y Financiera',
        ]);
        Area::factory()->create([
            'nombre' => 'Ingenieria',
        ]);
        Area::factory()->create([
            'nombre' => 'Desarrollo de negocios',
        ]);
        Area::factory()->create([
            'nombre' => 'Proyectos',
        ]);
        Area::factory()->create([
            'nombre' => 'Servicios',
        ]);
        Area::factory()->create([
            'nombre' => 'Calidad',
        ]);

        Rol::factory()->create([
            'nombre' => 'Profesional de pryectos-Desarrollador',
        ]);
        Rol::factory()->create([
            'nombre' => 'Gerente estrategico',
        ]);
        Rol::factory()->create([
            'nombre' => 'Auxiliar de administrativo',
        ]);
        Employe::factory(10)->create();
    }
}
