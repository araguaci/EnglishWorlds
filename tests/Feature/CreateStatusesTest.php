<?php

namespace Tests\Feature;

use Tests\TestCase;

class CreateStatusesTest extends TestCase
{
    protected $status;

    function setUp()
    {
        parent::setUp();

        $this->status = factory('English\Status')->raw();
    }

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
         $this->post('/', $this->status);
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
        $this->login(factory('English\User')->create());

        $this->post('/', $this->status);

        $this->get('/')
             ->assertSee($this->status['body']);
    }
}
