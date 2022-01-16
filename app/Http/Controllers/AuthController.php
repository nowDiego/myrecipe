<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
          return Redirect::to('dashboard');
        }

        return view('Auth.login');
    }
  

    public function login(Request $request)
    {
   
    try{

    $user = User::where('name', $request->name)->first();              
             
        
      if (!$user) {
        return Redirect::back()->with('message', 'Invalid Login');
   }

   if (! Hash::check($request->password, $user->password)) {
    return Redirect::back()->with('message', 'Invalid Login');
}

  $auth = Auth::login($user);


   return Redirect::to('/dashboard');

}catch (Throwable $e) {
  report($e);

  return Redirect::back()->with('error', 'There was an error trying to log in');
}
  
    }

    public function logout(){     
       
        $user = Auth::user();

      if(!$user){
      
        return Redirect::to('/login');
      
    }
        Auth::logout();
        return Redirect::to('/login');
    }
    
}
