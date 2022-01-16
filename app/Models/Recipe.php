<?php

namespace App\Models;

use App\Models\Category;
use App\Models\StatusRecipe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory;

    protected $table = "recipes";


protected $fillable = [
    'name',
    'ingredient',
    'preparation',
    'preparation_time',
    'yield',
    'observation',
    'photo',
    'user_id',
    'category_id',
    'status_recipes_id'
];


public function Category(){
    return $this->belongsTo(Category::class,'category_id','id');
}

public function Status(){
   return  $this->belongsTo(StatusRecipe::class,'status_recipes_id','id');
}

public function User(){
    return  $this->belongsTo(User::class,'user_id','id');
 }


}
