<?php

use Faker\Generator as Faker;

$factory->define(English\Status::class, function (Faker $faker) {
    return [
      'user_id' => function () {
          return factory('English\User')->create()->id;
      },
      'tag_id' => function() {
          return factory('English\Tag')->create()->id;
      },
      'body' => $faker->paragraph,
    ];
});
