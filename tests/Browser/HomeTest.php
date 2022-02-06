<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\Browser\Pages\HomePage;
use Tests\DuskTestCase;
use Throwable;

class HomeTest extends DuskTestCase
{
    /**
     * Test that we see the home page and its content.
     *
     * @return void
     * @throws Throwable
     */
    public function test_we_see_home_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new HomePage)
                ->assertSee("Hi")
                ->assertSee('LANGUAGES: PHP, Javascript, C#.')
                ->assertSee('MOTHERBOARD: MSI B450 Tomahawk MAX')
                ->assertSee('Home')
                ->assertSee('Blog')
                ->assertSee('Projects')
                ->assertSee('Tools')
                ->assertSee('Contact')
                ->assertSee('Sign In')
                ->assertDontSee('Canvas')
                ->assertDontSee('Horizon')
                ->assertDontSee('Settings')
                ->assertDontSee('API Keys')
                ->assertDontSee('Sign Out')
                ->screenshot("test_we_see_home_page");
        });
    }
}
