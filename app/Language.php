<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function meal()
    {
        return $this->belongsTo( 'App\Meal', 'language_id ');
    }
}
