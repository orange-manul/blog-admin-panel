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
        // Ensure the directory exists and is writable
        if (!is_dir(public_path('storage/images'))) {
            mkdir(public_path('storage/images'), 0775, true);
        }

        return [
            'path' => 'images/' . $this->faker->image('public/storage/images', 400, 300, null, false),
            'post_id' => \App\Models\Post::factory(), // Relationship with the Post factory
        ];
    }
}
