<?php

use App\Models\User\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Role::$ROLES as $key => $name) {
            Role::create([
                'name' => $key,
                'display' => $name,
            ]);
        }
    }
}
