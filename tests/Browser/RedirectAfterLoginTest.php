<?php

namespace Tests\Browser;

use English\User;
use English\Status;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class RedirectAfterLoginTest extends DuskTestCase
{

    /**
     * Assert that users gets redirected back to status page after login
     */
    public function testtestAuthenticatedUsersRedirect()
    {
        $user = create(User::class);
        $status = create(Status::class);

        $this->browse(function (Browser $browser) use ($user, $status) {
            $browser->visit('/');
            $browser->clickLink('Read more');
            $browser->visit($status->id);
            $browser->clickLink('Login');
            $browser->visit('/login');
            $browser->type('login', $user->email);
            $browser->type('password', 'secret'); // From user factory
            $browser->press('Login');
            $browser->assertPathIs('/' . $status->id);
        });
    }
}
