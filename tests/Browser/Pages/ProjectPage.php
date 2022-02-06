<?php

namespace Tests\Browser\Pages;

use JetBrains\PhpStorm\ArrayShape;
use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class ProjectPage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url(): string
    {
        return route('projects');
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertUrlIs($this->url());
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    #[ArrayShape(['@card' => "string", '@nav' => "string"])]
    public function elements(): array
    {
        return [
            '@card' => '.card',
        ];
    }
}
