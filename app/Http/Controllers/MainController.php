<?php

namespace App\Http\Controllers;

use App\Admin;
use App\College;
use App\Course;
use App\Instructor;
use App\Rating;
use App\Student;
use App\Form;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class MainController extends Controller
{
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

    public function login(Request $req)
    {
        $username = $req->input('regno');
        $password = $req->input('pass');

        $checkLogin = DB::table('userss')->where(['username' => $username, 'password' => $password])->get();
        if (count($checkLogin) > 0) {
            return Redirect::intended('/');
        } else {
            return Redirect::intended('/login');
        }
    }

    /* Functions to insert data into database */
    public function addAdmin(Request $req)
    {
        $adminID = $req->input('adminID');
        $adminFirstName = $req->input('adminFirstName');
        $adminMiddleName = $req->input('adminMiddleName');
        $adminLastName = $req->input('adminLastName');
        $data = array('admin_id' => $adminID, 'firstname' => $adminFirstName, 'middlename' => $adminMiddleName, 'lastname' => $adminLastName);
        DB::table('administrators')->insert($data);
        return redirect('add/admin');
    }

    public function addInstructor(Request $req)
    {
        $instructorID = $req->input('adminID');
        $instructorFirstName = $req->input('adminFirstName');
        $instructorMiddleName = $req->input('adminMiddleName');
        $instructorLastName = $req->input('adminLastName');
        $data = array('instructor_id' => $instructorID, 'firstname' => $instructorFirstName, 'middlename' => $instructorMiddleName, 'lastname' => $instructorLastName);
        DB::table('administrators')->insert($data);
        return redirect('add/instructor');
    }

    public function addCollege(Request $req)
    {
        $collegeShortName = $req->input('collegeShortName');
        $collegeName = $req->input('collegeName');
        $data = array('college_short_name' => $collegeShortName, 'college_name' => $collegeName);
        DB::table('colleges')->insert($data);
        return redirect('add/college');
    }

    public function addCourse(Request $req)
    {

    }

    public function addRatings()
    {
        //Code to insert ratings......
    }

    public function assignInstructorsCourses(Request $req)
    {
        $instructors = $req->input('instructors');
        $courses = $req->input('courses');
        $data = array('college_short_name' => $instructors, 'college_name' => $courses);
        DB::table('colleges')->insert($data);
        return redirect('add/college');
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
        $adminFirstName = $req->input('adminFirstName');
        $adminMiddleName = $req->input('adminMiddleName');
        $adminLastName = $req->input('adminLastName');
        $data = array('admin_id' => $adminID, 'firstname' => $adminFirstName, 'middlename' => $adminMiddleName, 'lastname' => $adminLastName);
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
        $collegeShortName = $req->input('collegeShortName');
        $collegeName = $req->input('collegeName');
        $data = array('college_short_name' => $collegeShortName, 'college_name' => $collegeName);
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

    //not yet
    public function assign()
    {
        $data  = [DB::table('instructors')->get()];
        foreach($data as $value){
            DB::table('instructors_courses')->insert(array(
                'instr_id' => $value->id,
                'course_id' => $value->course_id,
            ));
        }


    }
}
