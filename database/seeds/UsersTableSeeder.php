<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'info@evol.tech',
            'password' => bcrypt('Lockstock72'),
            'role' => 'admin',
            'remember_token' => str_random(10),
        ]);
    }
}
