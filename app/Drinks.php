<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drinks extends Model
{
    protected $guarded = [];
    
    public function drinker(){
        return $this->hasOne(Drinker::class);
    }

    // Return out of recommended serving of last drink entered to stay under 500 mg requirement.
    public function smart_serving($leftover,$id){

        $currentDrinkServing = Drinks::find($id)->caffeine_mg;
        $currentDrinkName = Drinks::find($id)->drink_name;
        $smartServing = $leftover / $currentDrinkServing;

        $str = "Your allowed " . round($smartServing, 2) . " more servings of " . $currentDrinkName;

        return $str;
         
    }
    
}
