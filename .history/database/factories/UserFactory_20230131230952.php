<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // public function definition()
    // {
    //     return [
    //         'name' => fake()->unique()->name(10),
    //         'email' => fake()->unique()->safeEmail(),
    //         'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    //         'img' => 'images/20200501_noimage.jpg',
    //         'role' => rand(5,11),
    //         'remember_token' => Str::random(10),
    //     ];
    // }
    $factory->define(User::class, function (Faker $faker){
        return [
            'name' => fake()->unique()->name(10),
            'email' => fake()->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'img' => 'images/20200501_noimage.jpg',
            'role' => rand(5,11),
            'remember_token' => Str::random(10),
        ];
    })

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
