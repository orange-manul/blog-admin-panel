<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);

        User::factory()->admin()->create();

        User::factory()->count(3)->moderator()->create();

        Post::factory()->count(10)->create()->each(function ($post) {
            $images = Image::factory()->count(1)->create(['post_id' => $post->id]);
            $post->category()->associate(Category::factory()->create())->save();

            Log::info('Created post', ['post_id' => $post->id, 'images' => $images->pluck('path')->toArray()]);
        });
    }
}

