<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * Get the user that belongs to this event.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
