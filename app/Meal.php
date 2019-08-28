<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Meal extends Model
{
    use \Dimsav\Translatable\Translatable;
    use SoftDeletes;
    
    public $translatedAttributes = ['title','description'];

    protected $guarded = [];

    protected $with = ['category', 'ingredients', 'tags'];
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
    public function mealtranslations()
    {
        return $this->hasMany('App\MealTranslation');
    }
}
