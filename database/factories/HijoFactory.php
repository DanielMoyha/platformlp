<?php

namespace Database\Factories;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hijo>
 */
class HijoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $paciente = Paciente::pluck('id');
        // $pacienteHijos = $paciente->cantidad_hijos

        return [
            'paciente_id' => $this->faker->randomElement($paciente),
            'nombre' => $this->faker->name(),
            'sexo' => $this->faker->randomElement(['masculino', 'femenino']),
            'edad' => $this->faker->biasedNumberBetween(1, 30),

        ];
    }
}
