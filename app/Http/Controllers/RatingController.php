<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Rating;
use App\Http\Requests;

class RatingController extends Controller
{
    public function countRecords(){
        $total_students = DB::table('ratings')->distinct('user_id')->count('user_id');
        $total_courses = DB::table('ratings')->distinct('course_id')->count('course_id');
        return view('view_report', compact('total_courses', 'total_students'));
    }
}
