<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Book::class, function (Faker $faker) {
    return [
        'author_id' => rand(1, 5),
        'title' => $faker->title(),
        'number_of_pages' => rand(20, 100),
        'description' => $faker->realText(rand(10, 50)),
        'img_path' => $faker->imageUrl()
    ];
});

