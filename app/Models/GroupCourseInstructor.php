<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupCourseInstructor extends Model
{
    protected $fillable = [
        'group_id',
        'course_id',
        'instructor_id',
        'locked_at',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }
}
