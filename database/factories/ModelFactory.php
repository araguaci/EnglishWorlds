
/*
|--------------------------------------------------------------------------
| Notification Factory
|--------------------------------------------------------------------------
*/

$factory->define(English\Models\Notification::class, function (Faker\Generator $faker) {
    return [
        'id' => 1,
        'user_id' => 1,
        'flag' => 'info',
        'uuid' => 'lksjdflaskhdf',
        'title' => 'Testing',
        'details' => 'Your car has been impounded!',
        'is_read' => 0,
    ];
});

/*
|--------------------------------------------------------------------------
| Feature Factory
|--------------------------------------------------------------------------
*/

$factory->define(English\Models\Feature::class, function (Faker\Generator $faker) {
    return [
        'id' => 1,
        'key' => 'user-signup',
        'is_active' => false,
    ];
});

/*
|--------------------------------------------------------------------------
| Activity Factory
|--------------------------------------------------------------------------
*/

$factory->define(English\Models\Activity::class, function (Faker\Generator $faker) {
    return [
        'id' => 1,
        'user_id' => 1,
        'description' => 'Standard User Activity',
        'request' => [],
    ];
});
