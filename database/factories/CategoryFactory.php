<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Category;
use Faker\Generator as Faker;

    $factory->define(Category::class, function (Faker $faker) { 
    static $brojac = 1;
    static $cnt1 = -1;

    $categorytitles = array("Pasta","Pasta","Noodles","Nudle","BBQ","
    Roštilj","Roast","Pečenje","Chicken","Piletina","Seafood","Plodovi mora","Fish","Riba","Soup","Juhe i Čorbe","Salad","Salate","Cheeses","Sirevi");

    if($cnt1 == -1)
        {
            $cnt1++;
        }
        else
        {
        $cnt1 += 2;
        }
        if($cnt1 > 18) 
        {
            $cnt1 = 0;
        }

        $cnt2 = $cnt1+1;
    
    return [
        'slug' =>'category-'. $brojac++ ,
        'title:en' => "$categorytitles[$cnt1]",
        'title:hr' => "$categorytitles[$cnt2]",
    ];
});
