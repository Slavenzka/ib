<?php

use Illuminate\Database\Seeder;

class WorksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 5; $i > 0; $i--) {
            $title = $faker->words(rand(2, 6), true);
            $work = App\Models\Work\Work::create([
                'slug' => str_slug($title),
                'type_id' => rand(1, 3),
            ]);

            foreach (['en', 'ru'] as $lang) {
                \App\Models\Work\WorkTranslate::create([
                    'lang' => $lang,
                    'title' => ucfirst($title),
                    'description' => ucfirst($faker->words(rand(8, 16), true)),
                    'body' => '<p>' . implode('</p><p>', $faker->paragraphs(rand(2, 5))) . '</p>',
                    'work_id' => $work->id,
                ]);
            }

            $work->clearMediaCollection('preview');
            $work->addMediaFromUrl($faker->imageUrl(1000, 1000, 'abstract'))
                 ->toMediaCollection('preview');

            $work->clearMediaCollection('work');
            $work->addMediaFromUrl($faker->imageUrl(1000, 1000, 'business'))
                 ->toMediaCollection('work');
        }
    }
}
