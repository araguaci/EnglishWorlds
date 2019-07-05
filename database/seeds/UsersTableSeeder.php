<?php

use English\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        create(User::class, [
            'username' => 'Caddy',
            'email'    => 'salim@caddydz.me',
            'password' => bcrypt('cicada'),
        ]);
    }
}
