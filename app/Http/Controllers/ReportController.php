<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function reports()
    {
        $total_students = User::All()->count();
        $total_courses = Course::All()->count();
        $total_ratings_students = DB::table('ratings')->distinct('user_id')->count('user_id');
        $total_ratings_courses = DB::table('ratings')->distinct('course_id')->count('course_id');
        return view('view_report', compact('total_students', 'total_courses', 'total_ratings_students', 'total_ratings_courses'));
    }
}
