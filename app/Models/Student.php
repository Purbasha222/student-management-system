<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'course_id', 'enrolled_at'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
