<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class InstructorController extends Controller
{
    public function showInstructorCourses()
    {
        $data['data'] = DB::table('users')
            ->join('instructors_courses', 'users.id', '=', 'instructors_courses.instr_id')
            ->join('courses', 'instructors_courses.course_id', '=', 'courses.course_id')
            ->select('users.*', 'courses.*', 'instructors_courses.*')
            ->get();
        return view('instructor.home', $data);
    }
}
