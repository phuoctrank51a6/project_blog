<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'content' => $faker->paragraph(1),
        'status' =>rand(0,1),
        'post_id' => rand(1,10),
        'user_id' => rand(1,10),
    ];
});
