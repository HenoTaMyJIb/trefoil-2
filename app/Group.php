<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * The roles that belong to the user.
     */
    public function coaches()
    {
        return $this->belongsToMany(Coach::class);
    }

    /**
     *
     */
    protected $appends = ['coachesIds', 'coachesNames'];

    /**
     *
     */
    public function getCoachesIdsAttribute()
    {
        return $this->coaches->pluck('id');
    }

    /**
     *
     */
    public function getCoachesNamesAttribute()
    {
        return implode(', ', $this->coaches->map(function($coach) {
            return $coach->person->firstname . " " . $coach->person->lastname;
        })->toArray());
    }
}
