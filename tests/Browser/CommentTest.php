<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;

class CommentTest extends DuskTestCase
{
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
        $user = create('English\User');

        $status = create('English\Status', ['user_id' => $user->id]);

        $comment = create('English\Comment', ['status_id' => $status->id, 'user_id' => $user->id]);

        $this->browse(function ($browser) use($user, $status, $comment) {

             $browser->loginAs($user)
                      ->visit($status->path())
                      ->type('body', $comment->body)
                      ->keys('#comment', '{enter}')
                      ->assertPathIs($status->path())
                      ->assertSee($comment->body);
        });
    }
}
