<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

use App\Http\Requests;

class QuestionController extends Controller
{
    public function store(Request $req){
        foreach ($req->get('content') as $value) {
                $question = new Question();
                $question->content = $value;
                $question->save();
        }
        return redirect('add/form')->with('message_create_question', 'Questions added successfully!');
    }
}
