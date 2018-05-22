<?php

namespace Tests\Feature;

use Tests\TestCase;

class ReadStatusesTest extends TestCase
{
    public function setUp()
    {
        // Create a status globally
        parent::setUp();

        $this->status = create('English\Status');
    }

    /** @test */
    public function a_user_can_view_all_statuses()
    {
        // Hit the root route and assert that the created status body can be seen
        $this->get('/')
          ->assertSee($this->status->body);
    }

    /** @test */
    public function they_can_read_a_single_status()
    {
        // Create a status
        $this->get($this->status->path())
          ->assertSee($this->status->body);
    }

    /*
     * Given we have a status
     * And that status includes comments
     * When we visit a status page
     * Then we should see the comments.
     */

    /** @test */
    public function they_can_read_comments_that_are_associated_with_a_status()
    {
        $comment = create('English\Comment', ['status_id' => $this->status->id]);

        $this->get($this->status->path())
          ->assertSee($comment->body);
    }

    /** @test */
    function a_user_can_filter_statuses_according_to_a_tag()
    {
        $tag = create('English\Tag');
        $statusInTag = create('English\Status', ['tag_id' => $tag->id]);
        $statusNotInTag = create('English\Status');

        $this->get('/tags/' . $tag->slug)
             ->assertSee($statusInTag->body)
             ->assertDontSee($statusNotInTag->body);
    }
}
