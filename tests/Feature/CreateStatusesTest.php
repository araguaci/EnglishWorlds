<?php

namespace Tests\Feature;

use Tests\TestCase;

class CreateStatusesTest extends TestCase
{
    /**
     * Test non authenticated users
     * can not post statuses.
     *
     * @param none
     *
     * @throws ExpectationFailedException
     *
     * @return PHPUnit\Framework::expectException
     */

    /** @test */
    public function guests_shall_not_create_statuses()
    {
        $this->get('/')->assertDontSee('Write status');
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $this->post('/', []);
    }

    /**
     * Test users can post statuses
     * Given we have an authenticated user
     * When we hit the endpoint to create a status
     * and visit the statuses index page
     * we should see the new status.
     *
     * @param none
     *
     * @throws ExpectationFailedException
     *
     * @return PHPUnit\Framework\Assert::assertContains
     */

    /** @test */
    public function users_can_create_statuses()
    {
        $this->login();
        $status = create('English\Status', [], 'raw');
        $response = $this->post('/', $status);
        $this->get($response->headers->get('Location'))
             ->assertSee($status['body']);
    }

    /** @test */
    public function a_status_requires_a_body()
    {
        $this->publishStatus(['body' => null])
             ->assertSessionHasErrors('body');
    }

    /** @test */
    public function a_status_requires_a_tag()
    {
        factory('English\Tag', 2)->create();

        $this->publishStatus(['tag_id' => null])
             ->assertSessionHasErrors('tag_id');

        $this->publishStatus(['tag_id' => 999])
             ->assertSessionHasErrors('tag_id');
    }

    public function publishStatus($overrides = [])
    {
        $this->login();
        $status = create('English\Status', $overrides, 'raw');

        return $this->post('/', $status);
    }
}
