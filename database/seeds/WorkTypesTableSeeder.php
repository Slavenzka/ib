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
        foreach (\App\Models\App::$TYPES as $key => $type) {
            $item = \App\Models\Work\WorkType::create([
                'slug' => str_slug($key),
            ]);

            foreach (['ru', 'en'] as $lang) {
                \App\Models\Work\WorkTypeTranslate::create([
                    'lang' => $lang,
                    'title' => $type[$lang],
                    'type_id' => $item->id,
                ]);
            }
        }
    }
}
