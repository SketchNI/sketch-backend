<?php

namespace Tests\Feature;

use App\Mail\ContactMail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /**
     * Test that the contact page renders
     *
     * @return void
     */
    public function test_that_the_contact_page_renders()
    {
        $response = $this->get(route('contact'));

        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_that_we_can_send_mail()
    {
        Mail::fake();

        Mail::assertNothingQueued();

        $this->post(route('contact'), [
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail(),
            'message' => $this->faker->paragraphs(2, true)
        ]);

        Mail::assertQueued(ContactMail::class);

    }
}
