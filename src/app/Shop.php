<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable =
    [
        'id',
        'name',
        'catch',
        'photo',
        'area',
        'url',
    ];
}
