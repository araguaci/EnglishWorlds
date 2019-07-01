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
    public function aStatusHasComments()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->status->comments);
    }

    /** @test */
    public function itHasAnOwner()
    {
        $this->assertInstanceOf('English\User', $this->status->owner);
    }

    /** @test */
    public function itCanHaveAComment()
    {
        $this->status->addComment([
            'body'    => 'Foobar',
            'user_id' => 1,
        ]);
        $this->assertCount(1, $this->status->comments);
    }

    /** @test */
    public function itHasATag()
    {
        $status = create('English\Status');
        $status->tags()->attach(create('English\Tag'));
        $this->assertInstanceOf('English\Tag', $status->tags()->first());
    }
}
