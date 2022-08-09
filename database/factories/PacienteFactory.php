<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'caso' => $this->faker->unique()->numberBetween(0, 11000),
            // 'codigo_paciente' => $this->faker->unique()->randomNumber(3, false),
            'fecha' => $this->faker->dateTimeThisYear(),
            'hora' => $this->faker->time(),
            'nombres' => $this->faker->name(),
            // 'apellidos',
            'edad' => $this->faker->biasedNumberBetween(12, 100),
            'sexo' => $this->faker->randomElement([0, 1]),
            'direccion' => $this->faker->address(),
            'telefono' => $this->faker->numerify('########'),
            'telefono_referencia' => $this->faker->numerify('########'),
            'estado_civil' => $this->faker->randomElement(['soltero', 'casado', 'divorciado', 'viudo']),
            'anios' => $this->faker->biasedNumberBetween(0, 50),
            'nombre_esposo' => $this->faker->name(),
            'edad_esposo' => $this->faker->biasedNumberBetween(12, 99),
            'grado_instruccion' => $this->faker->randomElement(['primaria', 'secundaria', 'bachiller', 'profesional']),
            'cantidad_hijos' => $this->faker->randomDigit(),
            'ocupacion' => $this->faker->word(),
            'ingreso_mensual' => $this->faker->randomFloat(2, 1000, 1000000),
            'motivo_consulta' => $this->faker->sentence(),
            'historia_familiar' => $this->faker->paragraphs(2, true),
            'tipo_familia' => $this->faker->randomElement(['monoparental', 'nuclear', 'extensa', 'ampliada', 'reconstituida']),
            'tipo' => $this->faker->randomElement(['funcional', 'disfuncional']),
            'conyugal' => $this->faker->randomElement(['estables', 'estrecho', 'distante', 'conflictivo', 'otros']),
            'materno' => $this->faker->randomElement(['estables', 'estrecho', 'distante', 'conflictivo', 'otros']),
            'paterno' => $this->faker->randomElement(['estables', 'estrecho', 'distante', 'conflictivo', 'otros']),
            'fraterno' => $this->faker->randomElement(['estables', 'estrecho', 'distante', 'conflictivo', 'otros']),
            'diagnostico_social' => $this->faker->text(),
            'acciones' => $this->faker->text(),
            // 'user_id' => $this->faker->randomElement([2, 3, 4, 6, null]),
            //'created_at' => $this->faker->dateTimeBetween('-6 month', '+1 month'),
            'created_at' => $this->faker->dateTimeThisYear(),
        ];
    }
}