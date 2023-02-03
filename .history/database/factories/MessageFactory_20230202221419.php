<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Comment;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => function()
            {
                return User::factory()->create()->id; //外部キー制約
            },
            'PostText' => 'test',
            'postimg1' => 'images/20200501_noimage.jpg',
            'postimg2' => 'images/20200501_noimage.jpg',
        ];
    }
}
