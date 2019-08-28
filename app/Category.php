<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    use \Dimsav\Translatable\Translatable;

    protected $guarded = [];
    
    public $translatedAttributes = ['title'];

    public function meals()
    {
        return $this->hasMany('App\Meal');
    }
    public function categorytranslations()
    {
        return $this->hasMany('App\CategoryTranslation');
    }
  
}
