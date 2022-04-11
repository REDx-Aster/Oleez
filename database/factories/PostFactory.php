<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;


class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(6, true),
            'content' => $this->faker->text(100),
            'preview_image' => $this->faker->imageUrl(),
            'category_id' => Category::get()->random()->id,
            'main_image' => $this->faker->imageUrl(),

        ];
    }
}
