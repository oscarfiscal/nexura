<?php

namespace Database\Factories;

use App\Models\Area;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employe>
 */
class EmployeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'correo' => $this->faker->email,
            'sexo' => $this->faker->randomElement(['masculino', 'femenino']),
            'area_id'=>$this->faker->randomElement([Area::all()->random()]),
            'descripcion' => $this->faker->text,
            'boletin' => $this->faker->boolean,
        ];
    }
}
