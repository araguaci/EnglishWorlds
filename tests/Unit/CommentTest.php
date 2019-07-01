<?php

namespace Tests\Unit;

use Tests\TestCase;

class CommentTest extends TestCase
{
    /** @test */
    public function aCommentHasAnOwner()
    {
        $this->assertInstanceOf('English\User', create('English\Comment')->owner);
    }
}
