<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name', 'year_level'];

    public function scheduleEntries()
    {
        return $this->hasMany(ScheduleEntry::class);
    }

    public function groupCourseInstructors()
    {
        return $this->hasMany(GroupCourseInstructor::class);
    }
}
