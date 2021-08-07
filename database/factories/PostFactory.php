<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence();

        return [
            'title'       => $title,
            'slug'        => Str::kebab($title),
            'body'        => '<p>' . implode('</p><p>', $this->faker->paragraphs(5)) . '</p>',
            'excerpt'     => '<p>' . implode('</p><p>', $this->faker->paragraphs(2)) . '</p>',
            'user_id'     => User::factory(),
            'category_id' => Category::factory(),
            'thumbnail'   => '/images/illustration-' . rand(1,5) . '.png',
        ];
    }
}
