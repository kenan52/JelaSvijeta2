<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\IngredientMeal;
use Faker\Generator as Faker;

$factory->define(IngredientMeal::class, function (Faker $faker) {
    $meals = App\Meal::pluck('id')->toArray();
    $ingredients = App\Meal::pluck('id')->toArray();
    return [
        'ingredient_id' => $faker->randomElement($ingredients),
        'meal_id' => $faker->randomElement($meals),
        
    ];
});
