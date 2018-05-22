<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TagTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function a_tag_consist_of_statuses()
    {
        $tag = create('English\Tag');
        $status = create('English\Status', ['tag_id' => $tag->id]);
        $this->assertTrue($tag->statuses->contains($status));
    }
}
