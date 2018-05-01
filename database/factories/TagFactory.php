<?php

use Faker\Generator as Faker;

$factory->define(English\Tag::class, function (Faker $faker) {
    $name = $faker->word;
    return [
        'name' => $name,
        'slug' => $name
    ];
});
