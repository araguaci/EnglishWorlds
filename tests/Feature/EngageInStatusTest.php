<?php

namespace Tests\Feature;

use Tests\TestCase;

class EngageInStatusTest extends TestCase
{
    protected $status, $comment;

    function setUp()
    {
        parent::setUp();

        $this->status = factory('English\Status')->create();

        $this->comment = factory('English\Comment')->raw();
    }
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

        $this->post($this->status->path() . '/comment', $this->comment);

        $this->get($this->status->path())
          ->assertSee($this->comment['body']);
    }

    /**
     * This test is supposed to fail inversely
     * Expecting an unauthenticated exception.
     *
     * @return Exception Illuminate\Auth\AuthenticationException
     */
    /** @test */
    public function unauthenticated_users_shall_not_comment()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $this->post('/1/comment', []);
    }
}
