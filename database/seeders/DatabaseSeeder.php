<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $john = User::factory()->create([
            'name'     => 'John Doe',
            'username' => 'john',
        ]);

        $hanna = User::factory()->create([
            'name'     => 'Hanna Smith',
            'username' => 'hanna',
        ]);

        Post::factory(10)->create([
            'user_id' => $john->id,
        ]);

        Post::factory(12)->create([
            'user_id' => $hanna->id,
        ]);

        Category::all()->map(function ($category) {
            Post::factory(2)->create([
                'category_id' => $category->id
            ]);
        });
    }
}
