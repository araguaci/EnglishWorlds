<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class HomePageTest extends DuskTestCase
{
    /**
     * Test that we can see the app name on the home page.
     *
     * @return void
     */

    /** @test */
    public function the_app_name_is_visible_on_home_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('English DZ');
        });
    }
}
