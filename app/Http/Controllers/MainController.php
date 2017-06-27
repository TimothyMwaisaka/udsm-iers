<?php

namespace App\Http\Controllers;

use App\Admin;
use App\College;
use App\Course;
use App\Instructor;
use App\Instructor_course;
use App\Rating;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Student_course;
use App\Question;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;


class MainController extends Controller
{
    public function _construct()
    {
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

    public function adminIndex()
    {
        return view('admin');
    }
    public function studentIndex()
    {
        return view('student.home');
    }
    public function instructorIndex()
    {
        return view('instructor.home');
    }
    public function addCollegeIndex()
    {
        return view('add_colleges');
    }
    public function addAdminIndex()
    {
        return view('add_admins');
    }
    public function addQuestionIndex()
    {
        return view('add_questions');
    }
    public function welcomeIndex()
    {
        return view('welcome');
    }


    /* Functions to insert data into database */
    public function addStudent(Request $req)
    {
        $student = new User();
        $student->name = $req->name;
        $student->email = $req->email;
        $student->remember_token = '';
        $student->password = bcrypt(Input::get('password'));
        $student->middlename = $req->middlename;
        $student->lastname = $req->lastname;
        $student->college_id = $req->college_id;
        $student->type = 'student';
        $student->save();
        return redirect('list/students')->with('message', 'Student Added Successfully!');
    }

    public function addAdmin(Request $req)
    {
        //validation
        $this->validate($req, array(
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|max:255|unique:users',
            'password' => 'required|min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/'
        ));
        $admin = new User();
        $admin->name = $req->name;
        $admin->email = $req->email;
        $admin->remember_token = '';
        $admin->password = bcrypt(Input::get('password'));
        $admin->middlename = $req->middlename;
        $admin->lastname = $req->lastname;
        $admin->college_id = "";
        $admin->type = 'admin';
        $admin->save();
        return redirect('list/admins')->with('message', 'Administrator Added Successfully!');
    }

    public function addInstructor(Request $req)
    {
        $instructor = new User();
        $instructor->name = $req->name;
        $instructor->email = $req->email;
        $instructor->remember_token = '';
        $instructor->password = bcrypt(Input::get('password'));
        $instructor->middlename = $req->middlename;
        $instructor->lastname = $req->lastname;
        $instructor->college_id = $req->college_id;
        $instructor->type = 'instructor';
        $instructor->save();
        return redirect('list/instructors')->with('message', 'Instructor Added Successfully!');
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
        $course = new Course();
        $course->course_code = $req->course_code;
        $course->course_name = $req->course_name;
        $course->college_id = $req->college_id;
        $course->save();
        return redirect('list/courses')->with('message', 'Course Added Successfully!');
    }

    public function addRating(Request $req)
    {
        foreach ($req->get('question_id') as $question => $value) {
                $rating = new Rating();
                $rating->course_id = $req->course_id;
                $rating->user_id = $req->user_id;
                $rating->question_id = $value;
                $rating->answer = $req->get('answer')[$question];
                $rating->save();
        }
        return redirect('student')->with('message', 'Ratings recorded successfully!');
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
        return back();
    }

    public function assignStudentsCourses(Request $req)
    {
        $this->validate($req, array(
            'user_id' => 'required|max:255',
            'course_id' => 'required|max:255'
        ));
        $student_course = new Student_course();
        $student_course->user_id = $req->user_id;
        $student_course->course_id = $req->course_id;
        $student_course->save();
         return back()->with('message', 'Course assigned Successfully!');;
    }

    /* Functions to view data from database */
    public function getAdmins()
    {
        $admins = User::all()->where('type', "admin");
        return view('view_admins', compact('admins'));
    }

    public function getInstructors()
    {
        $instructors = User::all()->where('type', "instructor");
        return view('view_instructors', compact('instructors'));
    }

    public function getStudents()
    {
        $students = User::all()->where('type', "student");
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
        $courses = Course::all();
        return View('view_courses', compact('courses'));
    }

    public function getInstructorsCourses()
    {
        $instructors = DB::table('users')
            ->select('*')
            ->where('type', "instructor")
            ->get();
        $courses = Course::all();
        return view('assign_instructor_course', compact('instructors', 'courses'));
    }

    public function getStudentsCourses()
    {
        $students = DB::table('users')
            ->select('*')
            ->where('type', "student")
            ->get();
        $courses = Course::all();
        return view('assign_student_course', compact('students', 'courses'));
    }

    public function getCollegesCourses()
    {
        $colleges = DB::table('colleges')
            ->select('*')
            ->get();
        return view('add_courses', compact('colleges'));
    }

    public function getStudentsColleges()
    {
        $colleges = College::all();
        return view('add_students', compact('colleges'));
    }

    public function getInstructorsColleges()
    {
        $colleges = College::all();
        return view('add_instructors', compact('colleges'));
    }

    public function showInstructorsCourses()
    {
        $instructors_courses = Instructor_course::all();
        return view('view_instructors_courses', compact('instructors_courses'));
    }

    public function showStudentsCourses()
    {
        $students_courses = Student_course::all();
        return view('view_students_courses', compact('students_courses'));
    }

    public function showForms($id)
    {
        $data['data'] = DB::table('questions')
            ->join('forms', 'questions.question_id', '=', 'forms.question_id')
            ->join('courses', 'forms.course_id', '=', 'courses.course_id')
            ->select('questions.question_id', 'questions.content', 'courses.course_id', 'courses.course_code', 'courses.course_name')
            ->where('forms.course_id', $id)
            ->get();
        return view('view_assessment_form', $data, compact('ratings'));
    }

    public function showStudentDetails($id)
    {
        $students = DB::table('users')
            ->join('students_courses', 'students_courses.user_id', '=', 'users.id')
            ->join('courses', 'students_courses.course_id', '=', 'courses.course_id')
            ->select('users.*', 'courses.*', 'students_courses.*')
            ->where('students_courses.user_id', $id)
            ->get();
        return view('view_student_details', compact('students'));
    }

    /*  Functions to update records  */
    public function editAdmins($id)
    {
        $data['data'] = DB::table('users')
            ->select('*')
            ->where('id', $id)
            ->get();
        return view('edit_admins', $data);
    }

    public function updateAdmins(Request $req, $id)
    {
        $admin_id = $req->input('admin_id');
        $firstname = $req->input('firstname');
        $middlename = $req->input('middlename');
        $lastname = $req->input('lastname');
        $data = array('admin_id' => $admin_id, 'firstname' => $firstname, 'middlename' => $middlename, 'lastname' => $lastname);
        DB::table('users')
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
        DB::table('users')->where('id', $id)->delete();
        return redirect('list/admins')->with('message', 'Admin Deleted Successfully!');
    }

    public function deleteColleges($cid)
    {
        DB::table('colleges')->where('college_id', $cid)->delete();
        return redirect('list/colleges')->with('message', 'College Deleted Successfully!');
    }

    public function deleteInstructors($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect('list/instructors')->with('message', 'Instructor Deleted Successfully!');
    }
    public function deleteCourses($id)
    {
        DB::table('courses')->where('course_id', $id)->delete();
        return redirect('list/courses')->with('message', 'Instructor Deleted Successfully!');
    }

    public function deleteStudents($id)
    {
        DB::table('students')->where('id', $id)->delete();
        return redirect('list/students')->with('message', 'Student Deleted Successfully!');
    }

    public function deleteInstructorCourse($cid)
    {
        DB::table('instructors_courses')->where('course_id', $cid)->delete();
        return redirect('list/instructors-courses')->with('message', 'Instructor Deleted Successfully!');
    }
    public function deleteForms($cid)
    {
        DB::table('forms')->where('course_id', $cid)->delete();
        return redirect('list/forms')->with('message', 'Form Deleted Successfully!');
    }
}
