<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CitaMedicaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fecha'=>$this->faker->date(),
            'hora'=>$this->faker->time('H:i'),
            'motivo'=>$this->faker->text(),
            'medico'=>$this->faker->randomElement(['Dr.Juan Perez','Dr.Maria Lopez','Dr.Carlos Ramirez']),
            'tipoCita'=>$this->faker->randomElement(['Cita de control','Cita por primera vez','Cita prioritaria']),
            'estado'=>$this->faker->randomElement(['Activo','Inactivo'])
        ];
    }
}
