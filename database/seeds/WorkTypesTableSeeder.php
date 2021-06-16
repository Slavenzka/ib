<?php

use App\Models\WorkType;
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
            WorkType::updateOrCreate([
                'slug' => str_slug($key),
            ], [
                'title' => $type
            ]);
        }
    }
}
