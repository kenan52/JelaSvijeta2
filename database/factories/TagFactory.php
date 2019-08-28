<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {

    static $brojac = 1;
    static $cnt1 = -1;

    $tagtitles = array("Egg free","Bez jaja","Meat","Meso","Fish","Riba","Salty","Slano","Sweet","Slatko","Sour","Kiselo","Gluten Free","Bez glutena","Lactose free","Bez laktoze","Fast","Brzo");

    if($cnt1 == -1)
        {
            $cnt1++;
        }

        else
        {
        $cnt1 += 2;
        }
        
        if($cnt1 > 17) 
        {
            $cnt1 = 0;
        }

        $cnt2 = $cnt1+1;
    
    return [
        'slug' =>'tag-'. $brojac++ ,
        'title:en' => "$tagtitles[$cnt1]",
        'title:hr' => "$tagtitles[$cnt2]",
        
    ];
});
