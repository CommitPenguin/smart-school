<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['code', 'name', 'units'];

    public function scheduleEntries()
    {
        return $this->hasMany(ScheduleEntry::class);
    }

    public function groupCourseInstructors()
    {
        return $this->hasMany(GroupCourseInstructor::class);
    }
}
