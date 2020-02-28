<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'content' => $faker->paragraph(6),
        'image' => $faker->imageUrl(640, 480, 'people'),
        'like' => rand(1,20),
        'status' =>rand(0,1),
        'user_id' => rand(1,10),
        'category_id' => rand(1,7),
    ];
});
