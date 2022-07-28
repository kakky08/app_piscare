<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'id',
        'category_id',
        'categoryName',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
