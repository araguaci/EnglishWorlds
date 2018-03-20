<?php

namespace Tests\Unit;

use Tests\TestCase;

class StatusTest extends TestCase
{
    protected $status;

    function setUp()
    {
        // Create a status globally
        parent::setUp();

        $this->status = factory('English\Status')->create();
    }

    /**
     * Test that a status can have comments.
     *
     * @return void
     */

    /** @test */
    function a_status_has_comments()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->status->comments);
    }

    /** @test */
    function it_has_an_owner()
    {
        $this->assertInstanceOf('English\User', $this->status->owner);
    }

    /** @test */
    function it_can_add_a_comment()
    {
      $this->status->addComment([
        'body' => 'Foobar',
        'user_id' => 1
      ]);

      $this->assertCount(1, $this->status->comments);
    }
}
