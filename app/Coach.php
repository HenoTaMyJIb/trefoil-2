<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    /**
     *
     */
    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    /**
     * The roles that belong to the user.
     */
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    /**
     *
     */
    public function scopeClub($query, $clubId)
    {
        return $query->where('club_id', $clubId);
    }
}
