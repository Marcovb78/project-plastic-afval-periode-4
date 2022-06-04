<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'picture',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get all activities belonging to this user.
     */
    public function activities()
    {
        return $this->hasMany(\Spatie\Activitylog\Models\Activity::class, 'subject_id');
    }

    /**
     * Get all owned cards from the user.
     */
    public function achievements ()
    {
        return $this->belongsToMany(Achievement::class)->withPivot('progress', 'completed');
    }

    /**
     * Get all events that this user joined.
     */
    public function events ()
    {
        return $this->belongsToMany(Event::class);
    }

}
