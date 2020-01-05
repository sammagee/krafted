<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Project::class, function (Faker $faker) {
    $title = $faker->sentence;

    return [
        'title' => $title,
        'slug' => Str::slug($title),
        'description' => $faker->paragraph,
        'image_url' => $faker->image('storage/app/public', 640, 480, null, false),
        'link' => $faker->url,
        'completed_at' => $faker->dateTimeBetween('now', '+1 year'),
    ];
});
