<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
         * Run the database seeds.
         */
        public function run()
        {
            $users = factory(English\User::class, 50)->create();
        }
}
