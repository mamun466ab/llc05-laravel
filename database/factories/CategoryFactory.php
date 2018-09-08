<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Category::class, function (Faker $faker) {
    $category = $faker->unique()->name;

    return [
        'name' => $category,
        'slug' => str_slug($category),
    ];
});
