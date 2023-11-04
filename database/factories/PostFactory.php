<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'       => User::inRandomOrder()->first()->id,
            'title'         => fake()->sentence(),
            'slug'          => fake()->slug(4),
            'image'         => fake()->imageUrl(),
            'body'          => fake()->paragraph(10),
            'published_at'  => fake()->dateTimeBetween('-1 Month', '+1 Month'),
            'featured'      => fake()->boolean(10),
        ];
    }
}