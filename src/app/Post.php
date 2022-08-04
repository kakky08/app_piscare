<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function materials()
    {
        return $this->hasMany('App\Material')->orderBy('created_at', 'desc');
    }

    public function seasonings()
    {
        return $this->hasMany('App\Seasoning')->orderBy('created_at', 'desc');
    }


    public function procedures()
    {
        return $this->hasMany('App\Procedure')->orderBy('order', 'asc');
    }


    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'postLikes')->withTimestamps();
    }

    public function isLikedBy(?User $user): bool
    {
        return $user
            ? (bool)$this->likes->where('id', $user->id)->count()
            : false;
    }

    public function getCountLikesAttribute(): int
    {
        return $this->likes->count();
    }
}
