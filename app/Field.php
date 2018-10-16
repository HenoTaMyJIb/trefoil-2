<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'is_full', 'name', 'description', 'hall'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['halls'];

    public function setHallAttribute($value)
    {
        $this->attributes['hall'] = implode(',', $value);
    }

    public function getHallsAttribute()
    {
        if(!$this->hall) {
            return [];
        }

        return explode(',', $this->hall);
    }
}
