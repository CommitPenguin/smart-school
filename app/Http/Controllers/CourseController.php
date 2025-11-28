<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    public function index()
    {
        return Course::orderBy('code')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code'  => 'required|string|unique:courses,code',
            'name'  => 'required|string',
            'units' => 'required|integer|min:1|max:10',
        ]);

        return Course::create($validated);
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'code' => ['required', Rule::unique('courses')->ignore($course->id)],
            'name' => 'required|string',
            'units' => 'required|integer|min:1|max:10',
        ]);

        $course->update($validated);
        return $course;
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
