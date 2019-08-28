<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealTag extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $table = 'meal_tag';
}
