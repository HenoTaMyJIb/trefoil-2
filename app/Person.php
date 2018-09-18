<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['firstname', 'lastname', 'address', 'personal_code', 'phone', 'email', 'work_place', 'age'];

    /**
     * The accessors to append channel's properties.
     *
     * @var array
     */
    protected $appends = ['name', 'birthdate'];

    /**
     *
     */
    public function getNameAttribute()
    {
        return $this->firstname.' '.$this->lastname;
    }

    // /**
    //  *
    //  */
    // public function getAgeAttribute()
    // {
    //     return (new PersonalCode($this->personal_code))->result['Age'];
    // }

   /**
    *
    */
   public function getBirthdateAttribute()
   {
       return (new PersonalCode($this->personal_code))->result['DateOfBirth'];
   }
}