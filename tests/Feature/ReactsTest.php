<?php

namespace Tests\Feature;

use English\Status;
use Tests\TestCase;

class ReactsTest extends TestCase
{
    /**
     * Assert guests can't like anything.
     *
     * @return void
     */
    public function test_guests_shall_not_react_on_anything()
    {
        $this->post('/api/statuses/1/likes')
             ->assertRedirect('login');
    }

    /**
     * Assert users can like a status.
     *
     * @return void
     */
    public function test_users_can_like_statuses()
    {
        $this->withoutExceptionHandling();
        $status = create(Status::class);
        $this->login();
        $this->post("/api/statuses/$status->id/likes");
        $this->assertCount(1, $status->likes);
    }

    public function test_authenticated_users_may_only_react_to_statuses_once()
    {
        $this->withoutExceptionHandling();
        $status = create(Status::class);
        $this->login();

        try {
            $this->post("/api/statuses/$status->id/likes");
            $this->post("/api/statuses/$status->id/likes");
        } catch (\Exception $ex) {
            $this->fail('Did not expect to insert the same record set twice');
        }
        $this->assertCount(1, $status->likes);
    }
}
