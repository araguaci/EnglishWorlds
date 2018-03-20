<?php

namespace Tests\Unit;

use Tests\TestCase;

class CommentTest extends TestCase
{
    /** @test */
    function a_comment_has_an_owner()
    {
        $comment = factory('English\Comment')->create();

        $this->assertInstanceOf('English\User', $comment->owner);
    }
}
