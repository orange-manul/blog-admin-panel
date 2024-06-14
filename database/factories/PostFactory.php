<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'category_id' => \App\Models\Category::factory()->create()->id,
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Post $post) {
            // Создаем изображения для поста
            Image::factory()->count(1)->create([
                'post_id' => $post->id,
            ]);
        });
    }
}
