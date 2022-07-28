<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function materials()
    {
        return $this->hasMany('App\RecipeMaterial')->orderBy('order', 'asc');
    }

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'recipeLikes')->withTimestamps();
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
