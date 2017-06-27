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
        //validation
        $this->validate($req, array(
            'course_id' => 'required|max:255|unique:forms',
            'question_id' => 'required'
        ));
        foreach ($req->get('question_id') as $question) {

                $form = new Form();
                $form->course_id = $req->course_id;
                $form->question_id = $question;
                $form->save();
        }
        return redirect('list/forms')->with('message_create_form', 'Form added successfully!');
    }

}
