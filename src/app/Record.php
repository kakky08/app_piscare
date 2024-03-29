<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [
        'user_id',
        'year_month',
        'day',
        'title',
        'image',
        'url',
    ];
}
