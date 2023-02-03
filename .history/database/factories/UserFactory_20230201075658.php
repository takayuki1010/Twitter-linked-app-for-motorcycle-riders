<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$rUBiykZ1QwGMPS.uctohCugP4Zv0SSlYXs2eDQ98xa5vc2prf3yOm',
            'img' => 'images/20200501_noimage.jpg',
            'role' => '11',
        ];
    }
}
