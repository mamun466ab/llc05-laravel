<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Post::class, function (Faker $faker) {
    return [
        'user_id' => random_int(1, 5),
        'category_id' => random_int(5, 15),
        'title' => $faker->realText(32),
        'content' => $faker->realText(),
        'thumbnail_path' => $faker->imageUrl(),
    ];
});
