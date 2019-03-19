<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Category\Category::class, function (Faker $faker) {
    $word= $faker->word;
    return [
        'nama_category' => $word,
    ];
});
