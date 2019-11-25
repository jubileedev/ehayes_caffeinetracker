<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Drinks;
use App\Drinker;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DrinksController extends Controller
{
   
    public function index(){
       return Drinks::all();
    }

    public function add()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        Drinks::create([
            'drink_name' => $request->input('drink'),
            'servings' => $request->input('serving'),
            'caffeine_mg' => $request->input('mg')
          ]);

          return response()->json($request->input('drink'));
    }


    //Return Calculated Caffeine Allowance for current day
    public function allowance(){
    
        $drinker = new Drinker();
        
        $allowance = $drinker->allowance();

        return response()->json($allowance);
    }

   
    
}
