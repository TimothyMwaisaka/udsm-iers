<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Rating;

class StudentController extends Controller
{
    public function showStudentCourses()
    {
        $data['data'] = DB::table('users')
            ->join('course_user', 'users.id', '=', 'course_user.user_id')
            ->join('courses', 'course_user.course_id', '=', 'courses.course_id')
            ->select('users.*', 'courses.*', 'course_user.*')
            ->get();
        return view('student.home', $data);
    }
    public function showForms($id)
    {
        $ratings = Rating::all();
        $data['data'] = DB::table('questions')
            ->join('forms', 'questions.question_id', '=', 'forms.question_id')
            ->join('courses', 'forms.course_id', '=', 'courses.course_id')
            ->join('instructors_courses', 'instructors_courses.course_id', '=', 'courses.course_id')
            ->join('users', 'users.id', '=', 'instructors_courses.instr_id')
            ->join('colleges', 'colleges.college_id', '=', 'users.college_id')
            ->select('users.*', 'colleges.*', 'questions.question_id', 'questions.content', 'courses.course_id', 'courses.course_code', 'courses.course_name')
            ->where('forms.course_id', $id)
            ->get();
        return view('view_assessment_form', $data, compact('ratings'));
    }
}
