<?php

namespace Tests\Browser;

use English\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Test that a user can login to the application.
     *
     * @return assertion
     */

    /** @test */
    public function aUserCanLogin()
    {
        $user = create(User::class, ['email' => 'salim@english.dz']);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->maximize();
            $browser->visit('/login')
                    ->type('login', $user->email)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertPathIs('/');
        });
    }
}
