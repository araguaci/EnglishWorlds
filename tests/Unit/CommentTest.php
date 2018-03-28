<?php

namespace Tests\Unit;

use Tests\TestCase;

class CommentTest extends TestCase
{
    /** @test */
    function a_comment_has_an_owner()
    {
        $this->assertInstanceOf('English\User', create('English\Comment')->owner);
    }
}
