<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = factory('English\Status', 50)->create();
        $statuses->each(function ($status) {
            factory('English\Comment', 10)->create([
            'status_id' => $status->id,
          ]);
        });
    }
}
