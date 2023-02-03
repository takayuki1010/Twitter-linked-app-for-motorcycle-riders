<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Message;
use App\Models\Comment;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'message_id' => function()
            {
                return Message::factory()->create()->id;
            },
            'user_id' => function()
            {
                return User::factory()->create()->id; //外部キー制約
            },
            'comment' => $faker->paragraph,
        ];
    }
}
