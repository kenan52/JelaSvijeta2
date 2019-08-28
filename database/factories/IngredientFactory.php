<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Ingredient;
use Faker\Generator as Faker;

$factory->define(Ingredient::class, function (Faker $faker) {

    static $cnt1 = -1;
    static $brojac = 1;

    $ingredienttitles=array("Rosemary","Ruzmarin","Coriander Powder","Korijander u prahu","Chives","Vlasac","Sage","Kadulja","Yellow Chillies","Žute čilije","Oregano","Origano","Paprika","Paprika","Carrot","Mrkva","Onion","Luk","Wheat","Pšenica","Milk","Mlijeko","Chicken","Piletina","Beef","Govedina","Pork","Svinjetina","Cabbage","Kupus","Butter","Maslac","Olive Oil","Maslinovo ulje","Palm Oil","Palmino ulje","Rice","Riža");

    if($cnt1 == -1)
    {
        $cnt1++;
    }

    else
    {
    $cnt1 += 2;
    }
    
    if($cnt1 > 38) 
    {
        $cnt1 = 0;
    }

    $cnt2 = $cnt1+1;

    return [
        'slug' =>'sastojak-'. $brojac++ ,
        'title:en' => "$ingredienttitles[$cnt1]",
        'title:hr' => "$ingredienttitles[$cnt2]",
    ];
});
