<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['title'];
    
    protected $guarded = [];

    public function meals()
    {
        $this->belongsToMany('App\Meal');
    }
    public function ingredienttranslations()
    {
        return $this->hasMany('App\IngredientTranslation');
    }
 
}