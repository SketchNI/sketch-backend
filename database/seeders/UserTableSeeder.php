<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => config('user.name'),
            'email' => config('user.email'),
            'password' => Hash::make(config('user.password'))
        ]);
    }
}
