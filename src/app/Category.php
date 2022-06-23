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

    public function subCategory()
    {
        return $this->hasMany('App\SubCategory');
    }
}
