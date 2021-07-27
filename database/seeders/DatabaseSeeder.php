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

        Post::factory(5)->create([
            'user_id' => $john->id,
        ]);

        $hanna = User::factory()->create([
            'name'     => 'Hanna Smith',
            'username' => 'hanna',
        ]);

        Post::factory(2)->create([
            'user_id' => $hanna->id,
        ]);
    }
}
