<?php

namespace Tests\Unit;

use Tests\TestCase;

class TagTest extends TestCase
{
    /** @test */
    public function a_tag_consists_of_many_statuses()
    {
        $tag = create('English\Tag');
        $status = create('English\Status');
        $status->tags()->attach($tag);
        $this->assertTrue($tag->statuses->contains($status));
    }
}
