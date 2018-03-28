<?php

namespace Tests\Feature;

use Tests\TestCase;

class CreateStatusesTest extends TestCase
{
    /**
     * Test non authenticated users
     * can not post statuses
     * @param none
     * @throws ExpectationFailedException
     * @return PHPUnit\Framework::expectException
     */

     /** @test */
     function guests_shall_not_create_statuses()
     {
         $this->withoutExceptionHandling();
         $this->expectException('Illuminate\Auth\AuthenticationException');
         $this->post('/', []);
     }

    /**
     * Test users can post statuses
     * Given we have an authenticated user
     * When we hit the endpoint to create a status
     * and visit the statuses index page
     * we should see the new status
     * @param none
     * @throws ExpectationFailedException
     * @return PHPUnit\Framework\Assert::assertContains
     */

    /** @test */
    function users_can_create_statuses()
    {
        $status = create('English\Status', [], 'raw');

        $this->login();

        $this->post('/', $status);

        $this->get('/')
             ->assertSee($status['body']);
    }
}
