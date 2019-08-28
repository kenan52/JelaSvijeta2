<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    
    public function category()
    {
         return $this->belongsTo('App\Category');
    }
}

