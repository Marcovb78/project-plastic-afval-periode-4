<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    /**
     * Scope a query to only include active articles.
     * 
     * @param Builder $builder
     * @return Builder $builder
     */
    public function scopeWhereActive(Builder $builder)
    {
        return $builder->where('active', true);
    }

    /**
     * Scope a query to only include pinned articles.
     * 
     * @param Builder $builder
     * @return Builder $builder
     */
    public function scopeWherePinned(Builder $builder)
    {
        return $builder->where('pinned', true);
    }
}
