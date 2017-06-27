<?php

namespace App\Http\Controllers;

use App\Course;
use App\Form;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function reports()
    {
        $ratings = DB::table('ratings')
            ->select('*')
            ->groupBy('ratings.course_id')
            ->join('courses', 'courses.course_id', '=', 'ratings.course_id')
            ->get();
//        $forms = Form::distinct()->select('*')->groupBy('course_id')->get();
//        $total_students = DB::table('users')->where('type', "student")->count('id');
//        $total_courses = Course::All()->count();
//        $total_ratings_students = DB::table('ratings')->distinct('user_id')->count('user_id');
//        $total_ratings_courses = DB::table('ratings')->distinct('course_id')->count('course_id');
        return view('view_report', compact('ratings'));
    }

    public function showReport($id)
    {
        $data['data'] = DB::table('ratings')
            ->join('forms', 'forms.course_id', '=', 'ratings.course_id')
            ->join('courses', 'courses.course_id', '=', 'forms.course_id')
            ->join('instructors_courses', 'instructors_courses.course_id', '=', 'courses.course_id')
            ->join('users', 'users.id', '=', 'instructors_courses.instr_id')
            ->join('colleges', 'colleges.college_id', '=', 'users.college_id')
            ->select('courses.course_id',
                'courses.course_code',
                'courses.course_name',
                'users.*',
                'instructors_courses.*',
                'ratings.*',
                'forms.*',
                'colleges.*')
            ->where('ratings.course_id', $id)
            ->get();

        $count_one = DB::table('ratings')
            ->where([
                ['answer', 1],
                ['ratings.course_id', $id]
            ])
            ->count('answer');

        $count_two = DB::table('ratings')
            ->where([
                ['answer', 2],
                ['ratings.course_id', $id]
            ])
            ->count('answer');

        $count_three = DB::table('ratings')
            ->where([
                ['answer', 3],
                ['ratings.course_id', $id]
            ])
            ->count('answer');

        $count_four = DB::table('ratings')
            ->where([
                ['answer', 4],
                ['ratings.course_id', $id]
            ])
            ->count('answer');

        $count_five = DB::table('ratings')
            ->where([
                ['answer', 5],
                ['ratings.course_id', $id]
            ])
            ->count('answer');

        $average = ($count_one + $count_two * 2 + $count_three * 3 + $count_four * 4 + $count_five * 5) / ($count_one + $count_two + $count_three + $count_four + $count_five);
        $average = round($average, 2);
        return view('view_report_details', $data, compact('average', 'count_one', 'count_two', 'count_three', 'count_four', 'count_five'));
    }
}
