<?php

namespace Tests;

use Canvas\Models\User;
use Hash;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\WithFaker;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use WithFaker;

    /**
     * A test user with the role of admin.
     *
     * @var User
     */
    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::create([
            'id' => $this->faker->uuid(),
            'name' => 'test',
            'username' => 'testy',
            'password' => Hash::make('super-secure123!'),
            'email' => 'test@example.com'
        ]);
    }
}
