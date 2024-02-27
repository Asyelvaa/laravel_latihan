<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nis' => $this->faker->unique()->randomNumber(5),
            'nama' => $this->faker->name($gender = null|'male'|'female'),
            'tanggal_lahir' => $this->faker->date(),
            'grade_id' => 1,
            'alamat' => $this->faker->streetAddress(),
        ];
    }
}
