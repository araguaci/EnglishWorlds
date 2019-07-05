<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class HomePageTest extends DuskTestCase
{
    /**
     * Test that we can see the app name on the home page.
     *
     * @return void
     */

    /** @test */
    public function theAppNameIsVisibleOnTheHomePage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('English DZ');
        });
    }
}
