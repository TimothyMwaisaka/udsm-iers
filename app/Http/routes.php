<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
Route::get('login', function () {
    return view('login');
});
Route::get('add/admin', function () {
    return view('add_admins');
});
Route::get('add/college', function () {
    return view('add_colleges');
});
Route::get('add/instructor', function () {
    return view('add_instructors');
});
Route::get('student', function () {
    return view('student.home');
});
Route::get('instructor', function () {
    return view('instructor.home');
});
Route::get('logout', function()
{
    Auth::logout();
    return View::make('logout');
});
Route::get('/list/courses', function()
{
    $courses = App\Course::all();
    return View::make('view_courses')->with('courses', $courses);
});
Route::post('login/system', [
    'uses' => 'loginController@login',
    'as' => 'login.system'
]);

/* Routes :: Get records from the database */
Route::get('list/admins', 'MainController@getAdmins');
Route::get('list/colleges', 'MainController@getColleges');
//Route::get('list/college', 'MainController@getCollege');
Route::get('list/instructors', 'MainController@getInstructors');
Route::get('list/students', 'MainController@getStudents');
Route::get('list/forms', 'MainController@getFormCourse');
Route::get('list/forms/{id}', 'MainController@showForms');

/* Routes :: Delete records from the database */
Route::get('list/admins/delete/{id}', 'MainController@deleteAdmins');
Route::get('list/colleges/delete/{id}', 'MainController@deleteColleges');
Route::get('list/instructors/delete/{id}', 'MainController@deleteInstructors');
Route::get('list/students/delete/{id}', 'MainController@deleteStudents');

/* Routes :: Insert records into the database */
Route::post('add/admin', 'MainController@addAdmin');
Route::post('add/college', 'MainController@addCollege');
Route::post('add/instructor', 'MainController@addInstructor');
Route::get('add/instructor', 'MainController@getFKColleges');
Route::post('add-students', 'MainController@addStudents');

/* Routes :: Update records */
//Route::get('edit/admins/{id}', 'MainController@editAdmins');
Route::get('edit/admins/{id}', function($id)
{
    $admins = App\Admin::find($id);
    return view::make('edit_instructors')->with('admins', $admins);;
    //$course = App\Course::where('course_id', $id);
});

Route::auth();
Route::get('/admin', function () {
    return view('admin');
})->name('admin');

Route::get('/home', 'HomeController@index');



Route::get('add','MainController@create1');
Route::post('add','MainController@store1');

