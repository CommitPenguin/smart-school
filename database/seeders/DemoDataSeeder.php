<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = [
            ['name' => 'BSIT 1A', 'year_level' => 1],
            ['name' => 'BSIT 1B', 'year_level' => 1],
        ];

        foreach ($groups as $g) {
            \App\Models\Group::firstOrCreate(['name' => $g['name']], $g);
        }

        $courses = [
            ['code' => 'MATH101', 'name' => 'Calculus 1', 'units' => 3],
            ['code' => 'CS101', 'name' => 'Intro to CS', 'units' => 3],
        ];

        foreach ($courses as $c) {
            \App\Models\Course::firstOrCreate(['code' => $c['code']], $c);
        }

        $instructors = [
            ['first_name' => 'John', 'last_name' => 'Doe', 'email' => 'john@example.com'],
            ['first_name' => 'Jane', 'last_name' => 'Smith', 'email' => 'jane@example.com'],
        ];

        foreach ($instructors as $i) {
            \App\Models\Instructor::firstOrCreate(['email' => $i['email']], $i);
        }

        $rooms = [
            ['name' => 'Room 101', 'capacity' => 40],
            ['name' => 'Room 102', 'capacity' => 40],
        ];

        foreach ($rooms as $r) {
            \App\Models\Room::firstOrCreate(['name' => $r['name']], $r);
        }
    }
}
