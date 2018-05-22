<?php

namespace Tests\Feature;

use Tests\TestCase;

class EngageInStatusTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->status = create('English\Status');

        $this->comment = create('English\Comment', [], 'raw');
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
    public function an_authenticated_user_may_engage_in_a_status()
    {
        // Set the currently logged in user for the application.
        $this->login();

        $this->post($this->status->path().'/comment', $this->comment);

        $this->get($this->status->path())
          ->assertSee($this->comment['body']);
    }

    /** @test */
    public function a_comment_required_a_body()
    {
        $this->login();
        $comment = create('English\Comment', ['body' => null], 'raw');
        $this->post($this->status->path().'/comment', $comment)
             ->assertSessionHasErrors('body');
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
        $this->post($this->status->path().'/comment', []);
    }
}
