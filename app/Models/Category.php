<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'slug'
    ];

    public function Recipes(){
     return   $this->hasMany( Recipe::class,'category_id','id');
    }

}
