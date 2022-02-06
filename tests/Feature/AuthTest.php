<?php

namespace Tests\Feature;

use Canvas\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_we_can_login()
    {
        $user = User::first();
        $response = $this
            ->followingRedirects()
            ->post(route('canvas.login'), [
                'email' => $user->email,
                'password' => 'super-secure123!'
            ]);

        $response->assertStatus(200)
            ->assertSee('Canvas');
    }
}
