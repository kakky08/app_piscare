<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'id',
        'parentCategoryId',
        'categoryName',

    ];

    public function subCategories()
    {
        return $this->hasMany('App\SubCategory');
    }
}
