<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
   

    public function index()
    {
        $userId = Auth::id();
        
        $latestRecipes = Recipe::where('user_id',$userId)->limit(4)->get();

        $recipeSuggestion = Recipe::where('user_id','!=', $userId)->where('status_recipes_id',2)->limit(4)->get();
           
        return View('Dashboard.index',['suggestion'=>$recipeSuggestion,'latest'=>$latestRecipes]);
    }


}
