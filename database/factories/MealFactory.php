<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Meal;
use App\Category;
use Faker\Generator as Faker;

    $factory->define(Meal::class, function (Faker $faker) {
        $categories = App\Category::pluck('id')->toArray();
        static $brojac1 = -1;
        
        $mealTitles = array("Soup","Čorba","Pancakes","Palačinke","Pie","Pita","Pasta","Pasta","Sausage","Kobasica","Salad","Salata","Ice cream","Sladoled","Omlet","Omlet","Pancakes","Palačinke","Salmon","Losos","Clams","Kunjke");
        $mealDescriptions = array("Red wine","Crveno vino","White wine","Bijelo vino","Milk","Mlijeko","Yogurt","Jogurt","Coke","Kola","Beer","Pivo","Orange juice","Sok od naranče","Apple juice","Sok od jabuke","Black wine","Crno vino","Sparkly water","Mineralna voda");


        if($brojac1 == -1)
        {
            $brojac1++;
        }

        else
        {
        $brojac1 += 2;
        }
        
        if($brojac1 > 18) 
        {
            $brojac1 = 0;
        }

        $brojac2 = $brojac1+1;
    
        return [
        'category_id' => $faker->randomElement($categories),
        
        'title:en'=> $mealTitles[$brojac1],
        'title:hr'=> $mealTitles[$brojac2],
        
        'description:en'=> "Goes well with $mealDescriptions[$brojac1]",
        'description:hr'=> "Dobro ide uz $mealDescriptions[$brojac2]",

        ]; 
});
