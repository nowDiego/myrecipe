<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusRecipe extends Model
{
    use HasFactory;

    protected $table = "status_recipes";

    protected $fillable = [
        'name'
    ];


 public function Recipes(){
   return  $this->hasMany(Recipe::class,'status_recipes_id','id');
 }

}
