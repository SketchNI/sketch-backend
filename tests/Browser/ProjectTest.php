<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\Browser\Pages\ProjectPage;
use Tests\DuskTestCase;
use Throwable;

class ProjectTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     * @throws Throwable
     */
    public function test_we_can_see_projects()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new ProjectPage())
                ->assertSee('SketchNI/megadrive-game')
                ->assertSee('A Sega Genesis/Mega Drive game!')
                ->assertSee('SketchNI/sketch-backend')
                ->assertSee('The backend of sketchni.uk')
                ->screenshot('test_we_can_see_projects');
        });
    }
}
