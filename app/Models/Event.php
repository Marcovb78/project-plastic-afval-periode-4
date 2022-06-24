<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are not mass assignable.
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes to cast as dates.
     * @var array
     */
    protected $dates = [
        'from_date', 'to_date',
    ];

    /**
     * The attributes to append to every instance.
     * @var array
     */
    protected $appends = [
        'has_joined', 'owner_is_friend',
    ];

    /**
     * Scope a query to only include events that have available spots.
     */
    public function scopeWhereNotFull(Builder $builder)
    {
        return $builder->where('total_spots', '>', $this->users->count());
    }

    /**
     * Scope a query to only include events that are in the future.
     */
    public function scopeWhereToCome(Builder $builder)
    {
        return $builder->where('from_date', '>', now());
    }

    /**
     * Scope a query to exclude events from the authenticated user.
     */
    public function scopeExcludeAuthUser(Builder $builder)
    {
        return $builder->where('user_id', '!=', auth()->id());
    }

    /**
     * Get the user that belongs to this event.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all the users that joined the event.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Check if the current user has joined the event.
     */
    public function getHasJoinedAttribute()
    {
        return $this->users->where('id', auth()->id())->count() == 1;
    }

    /**
     * Check if the owner of this event is a friend of the current authenticated user.
     */
    public function getOwnerIsFriendAttribute()
    {
        return auth()->user()->friends()->where('id', $this->user_id)->exists();
    }

    /**
     * Format the from date for nice viewing.
     */
    public function formattedStartDate()
    {
        return $this->from_date->isToday()
            ? 'Vandaag'
            : ucfirst($this->from_date->locale('nl')->diffForHumans([
                'options' => \Carbon\Carbon::ONE_DAY_WORDS | \Carbon\Carbon::TWO_DAY_WORDS,
            ]));
    }
}
