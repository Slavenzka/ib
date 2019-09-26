<?php

use Illuminate\Database\Seeder;

class WorkTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (\App\Models\Config::$TYPES as $key => $type) {
            $item = \App\Models\Work\WorkType::create([
                'slug' => str_slug($key),
                'title' => $type
            ]);
        }
    }
}
