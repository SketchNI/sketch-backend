<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the home page renders.
     *
     * @return void
     */
    public function test_that_the_home_page_renders()
    {
        $response = $this->get(route('index'));

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * Test that we can see the About Me data from Contentful.
     *
     * @return void
     */
    public function test_that_the_homepage_gets_about_me()
    {
        $response = $this->get('/api/pages/14');

        $response->assertStatus(Response::HTTP_OK)
            ->assertSeeText("Hi, I&#8217;m Denver. I&#8217;m a programmer, gamer and musician", false)
            ->assertSeeText("By the time I was 15 I was experimenting with C# and had even", false)
            ->assertSeeText("I wanted to write the fancy symbols that Frontpage generated", false)
            ->assertSeeText("I sort of got decent at this and decided", false)
            ->assertSeeText("The HTML and CSS was horrid but", false)
            ->assertSeeText("and I try to work on every idea I have to try and achieve that", false);
    }

    /**
     * Test that we can see the Programming Info data from Contentful.
     *
     * @return void
     */
    public function test_that_the_homepage_gets_programming_info()
    {
        $response = $this->get('/api/pages/19');

        $response->assertStatus(Response::HTTP_OK)
            ->assertSeeText("PHP, Javascript, C#", false)
            ->assertSeeText("PhpStorm", false)
            ->assertSeeText("Windows 11 Pro", false)
            ->assertSeeText("Mac OSX", false)
            ->assertSeeText("Chrome, Firefox", false);
    }

    /**
     * Test that we can see the PC Info data from Contentful.
     *
     * @return void
     */
    public function test_that_the_homepage_gets_pc_info()
    {
        $response = $this->get('/api/pages/26');

        $response->assertStatus(Response::HTTP_OK)
            ->assertSeeText("AMD Ryzen 5 3600", false)
            ->assertSeeText("Cooler Master MasterLiquid Lite 240", false)
            ->assertSeeText("Corsair Vengeance DDR4-3200 RGB", false)
            ->assertSeeText("MSI GTX 1660Ti", false)
            ->assertSeeText("MSI B450", false);
    }

    /**
     * Test that we can see the Gaming Info data from Contentful.
     *
     * @return void
     */
    public function test_that_the_homepage_gets_gaming_info()
    {
        $response = $this->get('/api/pages/23');

        $response->assertStatus(Response::HTTP_OK)
            ->assertSeeText("Sketch on Steam", false)
            ->assertSeeText("Search SketchNI", false)
            ->assertSeeText("Sketch on UPlay", false)
            ->assertSeeText("EPIC", false)
            ->assertSeeText("GOG", false)
            ->assertSeeText("STEAM", false);
    }
}
