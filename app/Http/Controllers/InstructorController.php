<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InstructorController extends Controller
{
    // GET /instructors
    public function index()
    {
        return Instructor::all();
    }

    // POST /instructors
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'email'      => 'required|email|unique:instructors,email',
        ]);

        return Instructor::create($validated);
    }

    // PUT /instructors/{id}
    public function update(Request $request, Instructor $instructor)
    {
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'email'      => [
                'required',
                'email',
                Rule::unique('instructors')->ignore($instructor->id)
            ],
        ]);

        $instructor->update($validated);
        return $instructor;
    }

    // DELETE /instructors/{id}
    public function destroy(Instructor $instructor)
    {
        $instructor->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
