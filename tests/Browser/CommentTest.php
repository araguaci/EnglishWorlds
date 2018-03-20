<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;
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
        $user = factory('English\User')->create();

        $status = factory('English\Status')->create([
          'user_id' => $user->id
        ]);

        $comment = factory('English\Comment')->create([
            'status_id' => $status->id,
            'user_id' => $user->id
          ]);

        $this->browse(function ($browser) use($user, $status, $comment) {

             $browser->loginAs($user)
                      ->visit('/1')
                      ->type('body', $comment->body)
                      ->press('Comment')
                      ->assertPathIs($status->path())
                      ->assertSee($comment->body);
        });
    }
}
