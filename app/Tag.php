<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use \Dimsav\Translatable\Translatable;
    

    public $translatedAttributes = ['title'];

    protected $guarded = [];

    public function meals()
    {
        $this->belongsToMany('App\Meal');
    }

    public function tagtranslations()
    {
        return $this->hasMany('App\TagTranslation');
    }   
}
