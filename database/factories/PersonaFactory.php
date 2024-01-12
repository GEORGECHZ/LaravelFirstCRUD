<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Persona>
 */
class PersonaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Persona::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'primer_ap' => $this->faker->lastName(),
            'segundo_ap' => $this->faker->lastName(),
            'rfc' => $this->faker->unique()->regexify('[A-Z]{4}[0-9]{6}[A-Z0-9]{3}'), // Custom regex for RFC format
            'telefono' => $this->faker->phoneNumber(),
            'tipo_persona' => $this->faker->randomElement(['FISICA', 'MORAL']),
            'estatus' => $this->faker->randomElement([1, 2])
        ];
    }
}
