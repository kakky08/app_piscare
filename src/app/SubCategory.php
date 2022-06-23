<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'id',
        'categoryId',
        'categoryName',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
