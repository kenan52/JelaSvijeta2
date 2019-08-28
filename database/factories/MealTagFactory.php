<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\MealTag;
use Faker\Generator as Faker;

$factory->define(MealTag::class, function (Faker $faker) {
    $meals = App\Meal::pluck('id')->toArray();
    $tags = App\Tag::pluck('id')->toArray();
    return [
        'meal_id' => $faker->randomElement($meals),
        'tag_id' => $faker->randomElement($tags),
    ];
});
