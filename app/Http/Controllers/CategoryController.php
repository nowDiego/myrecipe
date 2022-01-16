<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoryStoreRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $categories = Category::get();
        return view('Category.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Category.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        try{
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        if(!$category){
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return View('Category.edit',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        try{
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->save();


            if(!$category){
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return Redirect::back();
    }
}
