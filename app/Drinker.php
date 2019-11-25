<?php

namespace App;
use App\Drinker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Drinker extends Model
{
   protected $table = 'drinker';
   protected $guarded = [];


   public function drinks(){
       return $this->hasMany(Drinks::class);
   }

   public function getDrink($drink){
       return Drinker::find($drink)->drink_name;
   }

   
   public function reload_state_allowance(){
    $drinker = Drinker::where('drinker_id', Auth::id())->get();
    $total = $drinker->where('created_at', '>=', Carbon::today())->sum('caffeine_cost');
    return $total;
   }

   public function allowance(){
        $drinker = Drinker::where('drinker_id', Auth::id())->get();
        $total = $drinker->where('created_at', '>=', Carbon::today())->sum('caffeine_cost');
        if($total == 0){
            $total = 500;
            return $total;
        }
        else if($total >= 500) $total = 0;
        else{
            $total = 500 - $total;
        }

        return $total;
   }
}
