<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['comment', 'field_id', 'status'];

    public function student()
    {
        return $this->belongsTo(Person::class, 'student_id', 'id');
    }

    public function parent1()
    {
        return $this->belongsTo(Person::class, 'parent1_id', 'id');
    }

    public function parent2()
    {
        return $this->belongsTo(Person::class, 'parent2_id', 'id');
    }

    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    public static function fromForm($comment, $fieldId, Person $student, Person $parent1)
    {
        $registration = Registration::create([
            'comment' => $comment,
            'field_id' => $fieldId
        ]);

        $field = Field::find($fieldId);
        if ($field->is_full) {
            $registration->status = 'waiting';
        } else {
            $registration->status = 'new';
        }
        $registration->save();

        $registration->student()->associate($student);
        $registration->parent1()->associate($parent1);

        $registration->save();

        return $registration;
    }

    public function scopeStatus($query, $status)
    {
        if (!$status) {
            return $query;
        }

        return $query->where('status', $status);
    }

    public function scopeField($query, $field)
    {
        if (!$field) {
            return $query;
        }

        return $query->where('field_id', $field);
    }
}
