<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TagTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function aTagConsistsOfStatuses()
    {
        $tag = create('English\Tag');
        $status = create('English\Status');
        $status->tags()->attach($tag);
        $this->assertTrue($tag->statuses->contains($status));
    }
}
