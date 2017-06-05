<?php

namespace App\Http\Controllers;

use App\Student_course;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $courses = Student_course::all();

        return view('profile', compact('courses'));
    }
    public function showForms($id)
    {
        $data['data'] = DB::table('questions')
            ->join('forms', 'questions.question_id', '=', 'forms.question_id')
            ->join('courses', 'forms.course_id', '=', 'courses.course_id')
            ->select('questions.question_id', 'questions.content', 'courses.course_id', 'courses.course_code', 'courses.course_name')
            ->where('forms.course_id', $id)
            ->get();
        return view('view_assessment_form', $data);
    }
}
