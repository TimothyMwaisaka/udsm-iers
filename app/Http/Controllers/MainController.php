<?php

namespace App\Http\Controllers;

use App\Admin;
use App\College;
use App\Course;
use App\Instructor;
use App\Instructor_course;
use App\Student_course;
use App\Question;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class MainController extends Controller
{
    public function _construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /* Functions to insert data into database */
    public function addAdmin(Request $req)
    {
        //validation
        $this->validate($req, array(
            'admin_id' => 'required|max:255|unique:administrators',
            'firstname' => 'required',
            'lastname' => 'required'
        ));

        $admin_id = $req->input('admin_id');
        $firstname = $req->input('firstname');
        $middlename = $req->input('middlename');
        $lastname = $req->input('lastname');
        $data = array('admin_id' => $admin_id, 'firstname' => $firstname, 'middlename' => $middlename, 'lastname' => $lastname);
        DB::table('administrators')->insert($data);

        return redirect('list/admins');
        Session::put('success','Admin saved successfully');
    }

    public function addInstructor(Request $req)
    {
        $instructorID = $req->input('adminID');
        $instructorFirstName = $req->input('firstname');
        $instructorMiddleName = $req->input('middlename');
        $instructorLastName = $req->input('lastname');
        $data = array('instructor_id' => $instructorID, 'firstname' => $instructorFirstName, 'middlename' => $instructorMiddleName, 'lastname' => $instructorLastName);
        DB::table('administrators')->insert($data);
        return redirect('add/instructor');
    }

    public function addCollege(Request $req)
    {
        //validation
        $this->validate($req, array(
            'college_short_name' => 'required|max:255|unique:colleges',
            'college_name' => 'required|max:255|unique:colleges'
            ));

        $college_short_name = $req->input('college_short_name');
        $college_name = $req->input('college_name');
        $data = array('college_short_name' => $college_short_name, 'college_name' => $college_name);
        DB::table('colleges')->insert($data);
        return redirect('list/colleges');
    }

    public function addCourse(Request $req)
    {

    }

    public function addRating(Request $req)
    {
        $inputs = Input::get();
        foreach($inputs['results'] as $userId => $result){
            TestResults::updateCandidate($userId, $result);
        }
        $question_id = $req->get('question_id');
        $question = Question::where([ 'question_id' => $question_id])->first();
        $insert = $req->input($question);
        $data = array('answer' => $insert);
        DB::table('ratings')->insert($data);
    }

    public function assignInstructorsCourses(Request $req)
    {
        $this->validate($req, array(
            'instr_id' => 'required|max:255',
            'course_id' => 'required|max:255|unique:instructors_courses'
        ));
        $instructor_course = new Instructor_course();
        $instructor_course->instr_id = $req->instr_id;
        $instructor_course->course_id = $req->course_id;
        $instructor_course->save();
        return redirect('list/instructors-courses');
    }
    public function assignStudentsCourses(Request $req)
    {
        $this->validate($req, array(
            'stud_id' => 'required|max:255',
            'course_id' => 'required|max:255'
        ));
        $student_course = new Student_course();
        $student_course->stud_id = $req->stud_id;
        $student_course->course_id = $req->course_id;
        $student_course->save();
        return redirect('list/students-courses');
    }

    /* Functions to view data from database */
    public function getAdmins()
    {
        $admins = Admin::all();
        return view('view_admins', compact('admins'));
    }

    public function getInstructors()
    {
        $instructors = Instructor::all();
        return view('view_instructors', compact('instructors'));
    }

    public function getStudents()
    {
        $students = Student::all();
        return view('view_students', compact('students'));
    }

    public function getColleges()
    {
        $colleges = College::all();
        return view('view_colleges', compact('colleges'));
    }

    public function getForms()
    {
        $data['data'] = DB::table('courses')->distinct()->select('courses.course_id', 'courses.course_code', 'courses.course_name')->join('forms', 'courses.course_id', '=', 'forms.course_id')->get();
        if (count($data) > 0) {
            return view('view_forms', $data);
        } else {
            return view('add_form');
        }
    }

    public function getCourses()
    {
        $courses = DB::table('courses')->distinct()->select('courses.course_id', 'courses.course_code')->join('forms', 'courses.course_id', '=', 'forms.course_id')->get();
        return view('view_forms', compact('courses'));
    }

    public function getInstructorsCourses()
    {
        $instructors = Instructor::all();
        $courses = Course::all();
        return view('assign_instructor_course', compact('instructors', 'courses'));
    }
    public function getStudentsCourses()
    {
        $students = Student::all();
        $courses = Course::all();
        return view('assign_student_course', compact('students', 'courses'));
    }

    public function showInstructorsCourses()
    {
        $instructors_courses = Instructor_course::all();
        return view('view_instructors_courses', compact('instructors_courses'));
    }

    public function showStudentsCourses()
    {
        $students_courses = Student_course::orderBy('stud_id')->get();
        return view('view_students_courses', compact('students_courses'));
    }

    public function showForms($id)
    {
        $data['data'] = DB::table('questions')
            ->join('forms', 'questions.question_id', '=', 'forms.question_id')
            ->join('courses', 'forms.course_id', '=', 'courses.course_id')
            ->join('instructors', 'forms.instr_id', '=', 'instructors.id')
            ->select('questions.question_id', 'questions.content', 'courses.course_id', 'courses.course_code', 'courses.course_name', 'instructors.*')
            ->where('forms.course_id', $id)
            ->get();
        return view('view_assessment_form', $data);
    }
    public function showStudentDetails($id)
    {
        $students['students'] = DB::table('students')
            ->join('students_courses', 'students.id', '=', 'students_courses.stud_id')
            ->join('courses', 'students_courses.course_id', '=', 'courses.course_id')
            ->select('students.*', 'courses.*', 'students_courses.*')
            ->where('students_courses.stud_id', $id)
            ->get();
        return view('view_student_details', $students);
    }

    /*  Functions to update records  */
    public function editAdmins($id)
    {
        $data['data'] = DB::table('administrators')
            ->select('*')
            ->where('id', $id)
            ->get();
        return view('edit_admins', $data);
    }

    public function updateAdmins(Request $req, $id)
    {
        $adminID = $req->input('adminID');
        $firstname = $req->input('firstname');
        $middlename = $req->input('middlename');
        $lastname = $req->input('lastname');
        $data = array('admin_id' => $adminID, 'firstname' => $firstname, 'middlename' => $middlename, 'lastname' => $lastname);
        DB::table('administrators')
            ->where('id', $id)
            ->update($data);
        return redirect('list/admins');
    }

    public function editColleges($id)
    {
        $data['data'] = DB::table('colleges')
            ->select('*')
            ->where('college_id', $id)
            ->get();
        return view('edit_colleges', $data);
    }

    public function updateColleges(Request $req, $id)
    {
        $college_short_name = $req->input('college_short_name');
        $college_name = $req->input('college_name');
        $data = array('college_short_name' => $college_short_name, 'college_name' => $college_name);
        DB::table('colleges')
            ->where('college_id', $id)
            ->update($data);
        return redirect('list/colleges');
    }

    /*  Functions to delete data from database  */
    public function deleteAdmins($id)
    {
        DB::table('administrators')->where('id', $id)->delete();
        return redirect('list/admins');
    }

    public function deleteColleges($cid)
    {
        DB::table('colleges')->where('college_id', $cid)->delete();
        return redirect('list/colleges');
    }

    public function deleteInstructors($id)
    {
        DB::table('instructors')->where('id', $id)->delete();
        return redirect('list/instructors');
    }

    public function deleteStudents($id)
    {
        DB::table('students')->where('id', $id)->delete();
        return redirect('list/students');
    }

    public function deleteInstructorCourse($cid)
    {
        DB::table('instructors_courses')->where('course_id', $cid)->delete();
        return redirect('list/instructors-courses');
    }
}
