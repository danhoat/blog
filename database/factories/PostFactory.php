<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */



class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        $title = $this->faker->name;
        return [
            'title' => $title,
            'slug' => str_slug($title),
            'excerpt' => $this->faker->realText(250),
            'content' => $this->faker->realText(1000),
            'author_id' => \App\Models\User::factory()->create()->id,
            'category_id' => \App\Models\category::factory()->create()->id,
            'created_at' => now(),
        ];
    }
}
//use Faker\Generator as Faker;
//
//$factory->define(App\Post::class, function (Faker $faker) {
//    return [
//        'username' => $faker->name,
//        'email' => $faker->email,
//        'remember_token' => str_random(60),
//        'password' => $faker->sha1, // secret
//        'remember_token' => str_random(10)
//    ];
//});
