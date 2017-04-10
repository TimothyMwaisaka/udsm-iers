<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
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
    /* End - Functions to insert data into database - End */


    /* Functions to view data from database */
    public function getAdmins()
    {
        $data['data'] = DB::table('administrators')->get();
        if (count($data) > 0) {
            return view('view_admins', $data);
        } else {
            return view('add_admins');
        }
    }

    public function getColleges()
    {
        $data['data'] = DB::table('colleges')->get();
        if (count($data) > 0) {
            return view('view_colleges', $data);
        } else {
            return view('add_colleges');
        }
    }

    //Retrieve colleges using foreign key (not yet)
    public function getFKColleges()
    {
        $data['data'] = DB::table('colleges')->select('colleges.college_id', 'colleges.college_short_name')->join('instructors', 'colleges.college_id', '=', 'instructors.college_id')->get();
        if (count($data) > 0) {
            return view('add_instructors', $data);
        } else {
            return view('add_instructors');
        }
    }
    public function getFormCourse()
    {
        $data['data'] = DB::table('courses')->distinct()->select('courses.course_id', 'courses.course_code')->join('forms', 'courses.course_id', '=', 'forms.course_id')->get();
        if (count($data) > 0) {
            return view('view_forms', $data);
        } else {
            return view('add_form');
        }
    }

    public function getInstructors()
    {
        $data['data'] = DB::table('instructors')->get();
        if (count($data) > 0) {
            return view('view_instructors', $data);
        } else {
            return view('add_instructors');
        }
    }

    public function getStudents()
    {
        $data['data'] = DB::table('students')->get();
        if (count($data) > 0) {
            return view('view_students', $data);
        } else {
            return view('add_students');
        }
    }
    public function getCourses()
    {
        $data['data'] = DB::table('courses')->distinct()->select('courses.course_id', 'courses.course_code')->join('forms', 'courses.course_id', '=', 'forms.course_id')->get();
        if (count($data) > 0) {
            return view('view_forms', $data);
        } else {
            return view('add_form');
        }
    }

    /* End - Functions to view data from database - End */


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


    public function editAdmins($id)
    {
        $admins = Admin::find($id);
        return view('edit_instructors', ['admins'=>$admins]);
    }
}
