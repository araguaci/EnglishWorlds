<?php

namespace Tests\Unit;

use English\Status;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StatusTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    public function test_statuses_can_be_created()
    {
        $user = factory(\English\User::class)->create();

        $status = $user->statuses()->create([
          'body' => 'This is a status creation test body.'
        ]);

        $found_status = Status::find(1);

        $this->assertEquals($found_status->body, 'This is a status creation test body.');

        $this->assertDatabaseHas('statuses', ['id' => 1, 'body' => 'This is a status creation test body.']);
    }

    public function testStatusesCanBeDeleted()
    {
        $user = factory(\English\User::class)->create();

        $status = $user->statuses()->create([
          'body' => 'This is a status creation test body.'
        ]);

        $status->delete();

        $this->assertDatabaseMissing('statuses', ['id' => 1, 'body' => 'This is a status creation test body.']);
    }
}
