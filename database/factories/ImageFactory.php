<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    protected $model = Image::class;

    public function definition(): array
    {
        return [
            'path' => 'images/' . $this->faker->image('public/storage/images', 400, 300, null, false),
            'post_id' => \App\Models\Post::factory(), // Связь с фабрикой постов
        ];
    }
}
