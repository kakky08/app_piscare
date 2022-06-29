<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable = [
        'id',
        'title',
        'image',
        'people',

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }
}
