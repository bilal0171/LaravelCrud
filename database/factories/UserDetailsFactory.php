<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserDetailsFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email'=> $this->faker->unique()->safeEmail(),
            'password'=>bcrypt('bilal'),
            'phone'=> $this->faker->e164PhoneNumber,     // '+27113456789
            'dob'=>$this->faker->date($format = 'Y-m-d', $max = 'now'), // '1979-06-09'
            'address'=> $this->faker->address(),
            'gender' => $this->faker->randomElement(['M', 'F'])

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
