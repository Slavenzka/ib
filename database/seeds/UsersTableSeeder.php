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
        \App\Models\User\User::create([
            'name' => 'Admin',
            'email' => 'talanov.o@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => 1,
            'remember_token' => str_random(10),
        ]);
    }
}
