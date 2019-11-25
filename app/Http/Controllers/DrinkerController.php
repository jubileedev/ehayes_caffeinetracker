<?php

namespace App\Http\Controllers;

use App\Drinker;
use App\Drinks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class DrinkerController extends Controller
{

    //Return user's history of drink entries
    public function index(){
        $drinker = \App\Drinker::where('drinker_id', Auth::id())->get();
        return view('layouts.history', compact('drinker'));
    }
   
    /**
     * Store user's drink entry, return new calculated Caffeine Allowance and serving recommendation
     */
    public function store(Request $request)
    {
        $cost = Drinks::find($request->input('drink'))->caffeine_mg * $request->input('serving');

        $drinker = new Drinker();
        $total = $drinker->reload_state_allowance();
        
        $leftover_allowance = 500 - $total;
        $val = $cost + $total;
        
        if($val > 500){
            return response()->json('over500');
        }

         Drinker::create([
            'drinker_id' => Auth::id(),
            'beverage' => $request->input('drink'),
            'servings' => $request->input('serving'),
            'caffeine_cost' => $cost
          ]);
  
          $leftover_allowance = 500 - $total;
          $data_array["cost"] = $cost;

          $drinks = new Drinks();
          $smart_serving = $drinks->smart_serving($leftover_allowance,$request->input('drink'));
          $data_array["howmany"] = $smart_serving;
          
          return response()->json($data_array);
    }

    //Remove a user's drink from their drink history
    public function destroy($id){
       Drinker::find($id)->delete();
       return redirect('/history');
    }
    


}
