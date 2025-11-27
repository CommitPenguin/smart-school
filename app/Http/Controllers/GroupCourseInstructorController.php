<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupCourseInstructorController extends Controller
{
    public function showLock(Request $request)
    {
        $request->validate([
            'group_id' => 'required|exists:groups,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        $lock = GroupCourseInstructor::with('instructor')
            ->where('group_id', $request->group_id)
            ->where('course_id', $request->course_id)
            ->first();

        if (!$lock) {
            return response()->json([
                'locked' => false
            ]);
        }

        return response()->json([
            'locked' => true,
            'instructor' => [
                'id' => $lock->instructor->id,
                'full_name' => $lock->instructor->full_name,
                'email' => $lock->instructor->email,
            ],
        ]);
    }
}
