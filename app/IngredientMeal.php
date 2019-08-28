<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngredientMeal extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $table = 'ingredient_meal';
}
