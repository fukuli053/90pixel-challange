<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->state(App\Category::class, 'parent', function ($faker) {
    return [
        'parent_id' => factory(Category::class)->create()->id,
    ];
});
