<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CommentTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Given we have an authenticated user
     * And an existing status
     * When the user adds a comment to the status
     * Then their comment should be visible on the page.
     *
     * @return void
     */

    /** @test */
    function an_authenticated_user_may_engage_in_a_status()
    {
        // Set the currently logged in user for the application.
        $this->login($user = factory('English\User')->create());
        $status = factory('English\Status')->create();
        $comment = factory('English\Comment')->create();

        $this->post($status->path() . '/comment', $comment->toArray());
        $this->get($status->path())
          ->assertSee($comment->body);

        // Open a browser
        $this->browse(function (Browser $browser) use($user, $status, $comment) {
            // Navigate to a status
            $browser->visit($status->path())
                    ->press('Login')
                    ->assertPathIs('/home')
                    ->assertSee('Laravel');
        });
    }
}
