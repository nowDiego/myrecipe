<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\StatusRecipe;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\RecipeStoreRequest;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();
        $recipes = Recipe::where('user_id',$userId)->with('Status','Category')->get();
        return view('Recipe.index',['recipes'=>$recipes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           
        $status = StatusRecipe::get();
        $category = Category::get();
        return view('Recipe.register',["categories"=>$category,"status_recipe"=>$status]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecipeStoreRequest $request)
    {
try{
        $userId = Auth::id();
        $photo = null;
      
        if ($request->hasfile('photo')) {

            $Files = $request->file('photo');

            $name =  'recipe_' . time() . rand(1, 100) . '.' . $Files->getClientOriginalExtension();
            $Files->move(public_path() . '/image/_recipe/', $name);
            $photo = $name;
        }
                
        $recipe = new Recipe();
        $recipe->name = $request->name;
        $recipe->ingredient = $request->ingredient;
        $recipe->preparation = $request->preparation;
        $recipe->preparation_time = $request->preparation_time;        
        $recipe->yield = $request->yield;
        $recipe->observation = $request->observation;
        $recipe->photo = $photo;
        $recipe->user_id = $userId;
        $recipe->category_id = $request->category;
        $recipe->status_recipes_id = $request->status_recipe;
       
       
        $recipe->save();

        if(!$recipe){
            return Redirect::back()->with('error', 'Ocorreu um erro ao cadastrar');
        }

        return Redirect::back()->with('message', 'Cadastrado com sucesso');
   
    } catch (Throwable $e) {
        report($e);

        return Redirect::back()->with('error', 'Ocorreu um erro ao cadastrar');
    }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {     
       
       if($recipe->user_id != Auth::id()){
           return Redirect::to('/recipe');
       }

        return View('Recipe.show',['recipe'=>$recipe]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        if($recipe->user_id != Auth::id()){
            return Redirect::to('/recipe');
        }

        $status = StatusRecipe::get();
        $category = Category::get();
        return View('Recipe.edit',['recipe'=>$recipe,'categories'=>$category,'status_recipe'=> $status]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
        {
           try{
            if($recipe->user_id != Auth::id()){
                return Redirect::to('/recipe');
            }
            
            if ($request->hasfile('photo')) {

                $file_path = public_path()."/image/_recipe/".$recipe->photo;
               
                if(file_exists($file_path)){
                    unlink($file_path);
                }
        
                $Files = $request->file('photo');
    
                $name =  'recipe_' . time() . rand(1, 100) . '.' . $Files->getClientOriginalExtension();
                $Files->move(public_path() . '/image', $name);
                $photo = $name;
                $recipe->photo = $photo;
            }

        $recipe->name = $request->name;
        $recipe->ingredient = $request->ingredient;
        $recipe->preparation = $request->preparation;
        $recipe->preparation_time = $request->preparation_time;        
        $recipe->yield = $request->yield;
        $recipe->observation = $request->observation;
    
        $recipe->category_id = $request->category;
        $recipe->status_recipes_id = $request->status_recipe;
       
       
        $recipe->save();

    if(!$recipe){
        return Redirect::back()->with('error', 'Ocorreu um erro ao cadastrar');
    }

    return Redirect::back()->with('message', 'Cadastrado com sucesso');

} catch (Throwable $e) {
    report($e);

    return Redirect::back()->with('error', 'Ocorreu um erro ao cadastrar');
}
   

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)   
    {
        if($recipe->user_id != Auth::id()){
            return Redirect::to('/recipe');
        }
       
        $file_path = public_path()."/image/_recipe/".$recipe->photo;
               
        if(file_exists($file_path)){
            unlink($file_path);
        }

        $recipe->delete();

        return Redirect::back();
    }


    public function suggestion($id){
   
        $recipe = Recipe::where('id',$id)->where('status_recipes_id',2)->with('Status','Category')->first();
        return view('Recipe.show',['recipe'=>$recipe]);

    }


}
