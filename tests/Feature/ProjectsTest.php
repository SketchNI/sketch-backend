<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class ProjectsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that the Projects page renders.
     *
     * @return void
     */
    public function test_that_the_projects_page_exists()
    {
        $response = $this->get(route('projects'));

        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_that_we_get_projects()
    {
        $response = $this->get(route('api.projects'));

        $response->assertStatus(Response::HTTP_OK)
            ->assertJson(["data" => [
                    "repositoryOwner" => [
                        "repositories" => [
                            "totalCount" => json_decode($response->getContent())->data->repositoryOwner->repositories->totalCount
                        ]
                    ]
                ]
            ]);
    }


}
