<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Skill;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Skill::class, function (Faker $faker) {
    $name = ucfirst($faker->unique()->word);

    return [
        'name' => $name,
        'slug' => Str::slug($name),
    ];
});
