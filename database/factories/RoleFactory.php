<?php

use Faker\Generator as Faker;

/*
 * --------------------------------------------------------------------------
 * Role Factory
 * --------------------------------------------------------------------------
*/

$factory->define(English\Models\Role::class, function (Faker\Generator $faker) {
    return [
        'name' => 'member',
        'label' => 'Member',
    ];
});
