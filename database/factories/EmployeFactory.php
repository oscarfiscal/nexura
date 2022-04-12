<?php

namespace Database\Factories;

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
            'area'=>$this->faker->randomElement(['programacion', 'marketing', 'compras', 'finanzas', 'rrhh']),
            'descripcion' => $this->faker->text,
            'boletin' => $this->faker->boolean,
            'rol' => $this->faker->randomElement(['administrador', 'usuario']),
        ];
    }
}
