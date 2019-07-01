<?php

namespace Tests\Unit;

use Tests\TestCase;

class StatusTest extends TestCase
{
    public function setUp(): void
    {
        // Create a status globally
        parent::setUp();

        $this->status = create('English\Status');
    }

    /**
     * Test that a status can have comments.
     *
     * @return void
     */

    /** @test */
    public function a_status_has_comments()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->status->comments);
    }

    /** @test */
    public function it_has_an_owner()
    {
        $this->assertInstanceOf('English\User', $this->status->owner);
    }

    /** @test */
    public function it_can_has_a_comment()
    {
        $this->status->addComment([
        'body'    => 'Foobar',
        'user_id' => 1,
      ]);

        $this->assertCount(1, $this->status->comments);
    }

    /** @test */
    public function it_has_a_tag()
    {
        $status = create('English\Status');
        $status->tags()->attach(create('English\Tag'));
        $this->assertInstanceOf('English\Tag', $status->tags()->first());
    }
}
