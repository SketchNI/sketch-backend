<?php

namespace Tests\Feature;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Inertia\Testing\Assert;

class ToolTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that the Tool page renders.
     *
     * @return void
     */
    public function test_that_the_tool_page_renders()
    {
        $this->get(route('tools'))
            ->assertInertia(function(Assert $page) {
                $page->component('Tools')
                    ->missing('tools');
            });
    }
}
