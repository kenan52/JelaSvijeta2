<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagTranslation extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function tag()
    {
         return $this->belongsTo('App\Tag');
    }
    
}
