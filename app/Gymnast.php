<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gymnast extends Model
{
    /**
     *
     */
    protected $appends = ['name', 'age', 'birthdate'];

    /**
     *
     */
    public function getNameAttribute()
    {
        return $this->student->name;
    }

    /**
     *
     */
    public function getAgeAttribute()
    {
        return (new PersonalCode($this->student->personal_code))->result['Age'];
    }

    /**
     *
     */
    public function getBirthdateAttribute()
    {
        return (new PersonalCode($this->student->personal_code))->result['DateOfBirth'];
    }

    /**
     *
     */
    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    /**
     *
     */
    public function student()
    {
        return $this->belongsTo(Person::class);
    }

    /**
     *
     */
    public function parent1()
    {
        return $this->belongsTo(Person::class);
    }

    /**
     *
     */
    public function parent2()
    {
        return $this->belongsTo(Person::class);
    }

    /**
     *
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    /**
     *
     */
    public function scopeCurrentClub($query)
    {
        return $query->where('club_id', env('ACTIVE_CLUB'));
    }

    /**
     *
     */
    public function scopeByGroup($query, $groupId)
    {
        if(!$groupId) {
            return $query;
        }

        return $query->where('group_id', $groupId);
    }
}
