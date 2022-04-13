<?php

namespace Database\Seeders;

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
        Employe::factory(10)->create();
    }
}
