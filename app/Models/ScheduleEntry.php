<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduleEntry extends Model
{
    protected $fillable = [
        'group_id',
        'course_id',
        'instructor_id',
        'room_id',
        'day_of_week',
        'start_time',
        'end_time',
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

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
