<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class BlogTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that the Blog Posts page renders
     *
     * @return void
     */
    public function test_that_the_blog_posts_page_renders()
    {
        $this->markTestSkipped("Blog is currently not implemented");
        $response = $this->get(route('blog'));

        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_that_the_blog_posts_page_gets_blog_posts()
    {
        $this->markTestSkipped("Blog is currently not implemented");
        $response = $this->get(route('api.posts'));

        $response->assertStatus(Response::HTTP_OK)
            ->assertSeeText("FLoC - Fucking Load of Crap", false)
            ->assertSeeText("Search...ing my nightmare", false);
    }
}
