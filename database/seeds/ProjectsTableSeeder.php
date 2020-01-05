<?php

use Illuminate\Database\Seeder;
use Spatie\Tags\Tag;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Category::class, 10)->create()->each(function ($category) {
            $category->projects()->save(factory(App\Project::class)->make());
        });

        $tags = factory(Tag::class, 10)->create();
        $projects = App\Project::all();
        $projects->each(function ($project) use ($tags) {
            $project->attachTags($tags->random(rand(1, 3))->pluck('name')->toArray());
        });
    }
}
