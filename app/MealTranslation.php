<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealTranslation extends Model
{
    protected $guared = [];
    public $timestamps = false;
    
    public function meal()
    {
         return $this->belongsTo('App\Meal');
    } 
}
