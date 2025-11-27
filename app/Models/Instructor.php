<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email'];

    public function scheduleEntries()
    {
        return $this->hasMany(ScheduleEntry::class);
    }

    public function groupCourseInstructors()
    {
        return $this->hasMany(GroupCourseInstructor::class);
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
