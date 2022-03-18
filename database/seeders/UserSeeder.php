<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'David',
            'email' => 'davidpaz@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password
            'admin' => true,
            'remember_token' => Str::random(10),
        ]);
    }
}
