<?php

namespace App\Http\Controllers;

use App\Course;
use App\Form;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;

class FormController extends Controller
{
    public function show()
    {
        $questions = Question::all();
        $courses = Course::all();
        return view('create_forms', compact('questions', 'courses'));
    }

    public function store(Request $req)
    {
        foreach ($req->get('question_id') as $question) {
            if (Form::where('question_id', '=', Input::get('question_id'))->exists() && Form::where('course_id', '=', Input::get('course_id'))->exists()) {
                return redirect('add/form')->with('message_create_form_denied', 'Form exists!');
            } else {
                $form = new Form();
                $form->course_id = $req->course_id;
                $form->question_id = $question;
                $form->save();
            }
            return redirect('list/forms')->with('message_create_form', 'Form added successfully!');
        }
    }

}
