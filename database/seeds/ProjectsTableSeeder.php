<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = factory(App\Skill::class, 10)->create();
        factory(App\Category::class, 10)->create()->each(function ($category) {
            $category->projects()->save(factory(App\Project::class)->make());
        });

        $projects = App\Project::all();
        $projects->each(function ($project) use ($skills) {
            $project->skills()->attach($skills->random(rand(1, 5))->pluck('id')->toArray());
        });
    }
}
