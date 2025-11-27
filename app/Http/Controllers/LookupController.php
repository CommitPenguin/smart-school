<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LookupController extends Controller
{
    public function groups()
    {
        return Group::orderBy('name')->get();
    }

    public function courses()
    {
        return Course::orderBy('code')->get();
    }

    public function instructors()
    {
        return Instructor::orderBy('last_name')->orderBy('first_name')->get();
    }

    public function rooms()
    {
        return Room::orderBy('name')->get();
    }
}
