<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Auth.login');
});

// Route::get('/category', function () {
//     return view('User.register');
// });
Route::get('/login',[AuthController::class,'index'])->name('login.index');

Route::post('/login',[AuthController::class,'login'])->name('login.store');


Route::get('/user/register',[UserController::class,'create'])->name('user.create');

Route::post('/user',[UserController::class,'store'])->name('user.store');


Route::group(['middleware' => 'auth'], function () {

    Route::get('/logout',[AuthController::class,'logout'])->name('logout');   


Route::get('/category',[CategoryController::class,'index'])->name('category.index');

Route::get('/category/register',[CategoryController::class,'create'])->name('category.create');

Route::post('/category',[CategoryController::class,'store'])->name('category.store');

Route::get('/category/edit/{category}',[CategoryController::class,'edit'])->name('category.edit');

Route::put('/category/update/{category}',[CategoryController::class,'update'])->name('category.update');

Route::get('/category/destroy/{category}',[CategoryController::class,'destroy'])->name('category.destroy');

Route::get('/recipe',[RecipeController::class,'index'])->name('recipe.index');

Route::get('/recipe/register',[RecipeController::class,'create'])->name('recipe.create');

Route::post('/recipe',[RecipeController::class,'store'])->name('recipe.store');

Route::get('/recipe/show/{recipe}',[RecipeController::class,'show'])->name('recipe.show');

Route::get('/recipe/edit/{recipe}',[RecipeController::class,'edit'])->name('recipe.edit');

Route::put('/recipe/update/{recipe}',[RecipeController::class,'update'])->name('recipe.update');

Route::get('/recipe/destroy/{recipe}',[RecipeController::class,'destroy'])->name('recipe.destroy');

Route::get('/recipe/suggestion/{recipe}',[RecipeController::class,'suggestion'])->name('recipe.suggestion');

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard.index');



});