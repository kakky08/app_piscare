<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'id',
        'categoryId',
        'recipeTitle',
        'recipeUrl',
        'foodImageUrl',
        'mediumImageUrl',
        'smallImageUrl',
        'nickname',
        'recipeDescription',
        'recipeIndication',
        'recipeCost',
    ];
}
