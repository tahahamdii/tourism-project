<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = User::factory()->create([
            'name' => 'Ruba',
        ]);
        $category = Category::factory()->create();
        Post::factory(10)->create([
            'category_id' => $category->id,
            'user_id' => $user->id
        ]);

    }
}
