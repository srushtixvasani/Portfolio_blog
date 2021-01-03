<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\ModelUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // faker generated data
            // 'src' => $this->faker->imageUrl($width = 640, $height = 480), // 'http://lorempixel.com/640/480/'
            // 'title' => $this->faker->text(20), 
            // 'caption' => $this->faker->text(50),
            // 'user_id' =>\App\Models\User::inRandomOrder()->first()->id, 

        ];
    }
}
