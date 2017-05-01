<?php

$factory->define(English\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
                'name'           => $faker->userName,
                'firstName'      => $faker->firstNameMale,
                'lastName'       => $faker->lastName,
                'location'       => $faker->country,
                'email'          => $faker->unique()->freeEmail,
                'password'       => $password ?: $password = bcrypt('secret'),
                'remember_token' => str_random(10),
        ];
});
