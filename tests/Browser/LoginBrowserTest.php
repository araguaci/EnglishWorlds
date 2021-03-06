<?php

declare(strict_types=1);

namespace Tests\Browser;

use English\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class LoginBrowserTest extends DuskTestCase
{
	/**
	 * Test that a user can login to the application.
	 *
	 * @return assertion
	 */
	public function test_a_user_can_login()
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
