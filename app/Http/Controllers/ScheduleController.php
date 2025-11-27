<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        return ScheduleEntry::with(['group', 'course', 'instructor', 'room'])
            ->orderBy('day_of_week')
            ->orderBy('start_time')
            ->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'group_id'      => 'required|exists:groups,id',
            'course_id'     => 'required|exists:courses,id',
            'instructor_id' => 'required|exists:instructors,id',
            'room_id'       => 'required|exists:rooms,id',
            'day_of_week'   => 'required|string',
            'start_time'    => 'required|date_format:H:i',
            'end_time'      => 'required|date_format:H:i|after:start_time',
        ]);

        // 1️⃣ LOCK RULE: enforce fixed instructor for (group, course)
        $lock = GroupCourseInstructor::where('group_id', $data['group_id'])
            ->where('course_id', $data['course_id'])
            ->first();

        if ($lock) {
            if ($lock->instructor_id != $data['instructor_id']) {
                return response()->json([
                    'message' => 'Instructor is locked for this group and course.',
                    'locked_instructor_id' => $lock->instructor_id,
                ], 422);
            }
        } else {
            GroupCourseInstructor::create([
                'group_id'      => $data['group_id'],
                'course_id'     => $data['course_id'],
                'instructor_id' => $data['instructor_id'],
                'locked_at'     => now(),
            ]);
        }

        // 2️⃣ CONFLICT CHECK: overlapping time for group, room, instructor
        $hasConflict = $this->hasTimeConflict($data);

        if ($hasConflict) {
            return response()->json([
                'message' => 'Time conflict detected.',
                'conflicts' => $hasConflict,
            ], 422);
        }

        // 3️⃣ Create schedule entry
        $entry = ScheduleEntry::create($data);

        return $entry->load(['group', 'course', 'instructor', 'room']);
    }

    protected function hasTimeConflict(array $data)
    {
        // same day, overlapping time slots
        $query = ScheduleEntry::where('day_of_week', $data['day_of_week'])
            ->where(function ($q) use ($data) {
                $q->whereBetween('start_time', [$data['start_time'], $data['end_time']])
                  ->orWhereBetween('end_time', [$data['start_time'], $data['end_time']])
                  ->orWhere(function ($sub) use ($data) {
                      $sub->where('start_time', '<=', $data['start_time'])
                          ->where('end_time', '>=', $data['end_time']);
                  });
            });

        $conflicts = [
            'group'      => (clone $query)->where('group_id', $data['group_id'])->exists(),
            'instructor' => (clone $query)->where('instructor_id', $data['instructor_id'])->exists(),
            'room'       => (clone $query)->where('room_id', $data['room_id'])->exists(),
        ];

        if ($conflicts['group'] || $conflicts['instructor'] || $conflicts['room']) {
            return $conflicts;
        }

        return false;
    }
}
