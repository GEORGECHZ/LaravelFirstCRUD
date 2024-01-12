<?php

namespace Database\Factories;

use App\Models\Persona;
use App\Models\PersonaDomicilio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PersonaDomicilio>
 */
class PersonaDomicilioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = PersonaDomicilio::class;

    public function definition(): array
    {
        return [
            'domicilio' => $this->faker->address,
            'codigo_postal' => $this->faker->postcode,
            'telefono' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'tipo' => $this->faker->randomElement(['P', 'F']),
            'persona_id' => Persona::factory(),
        ];
    }
}


