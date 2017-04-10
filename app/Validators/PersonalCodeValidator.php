<?php

namespace App\Validators;

class PersonalCodeValidator
{
    public function validate($attribute, $value, $parameters, $validator)
    {
        if (!in_array($value[0], [3, 4, 5, 6])) {
            return false;
        }

        $year = intval(substr($value, 1, 2));
        $month = intval(substr($value, 3, 2));
        $day = intval(substr($value, 5, 2));
        
        if (!in_array($year, range(0, 99))) {
            return false;
        }

        if (!in_array($month, range(1, 12))) {
            return false;
        }

        if (!in_array($day, range(1, 31))) {
            return false;
        }

        return true;
    }
}
