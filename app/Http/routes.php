<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index');

Route::auth();

Route::group(['middleware' => ['web',]], function () {
    Route::group(['middleware' => ['auth',]], function () {
        Route::get('list/colleges', [
            'uses' => 'MainController@getColleges',
            'as' => 'view_colleges',
        ]);
    });

    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@getRegister');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin', function () {
        return view('admin');
    })->name('admin');

    /* Routes :: Get records from the database */
    Route::get('list/admins', 'MainController@getAdmins');
    Route::get('list/instructors', 'MainController@getInstructors');
    Route::get('list/students', 'MainController@getStudents');
    Route::get('list/forms', 'MainController@getForms');
    Route::get('list/forms/{id}', 'MainController@showForms');
    Route::get('admin/instructor-course', 'MainController@getInstructorsCourses');
    Route::get('list/instructors-courses', 'MainController@showInstructorsCourses');

    /* Routes :: Delete records from the database */
    Route::get('list/admins/delete/{id}', 'MainController@deleteAdmins');
    Route::get('list/colleges/delete/{id}', 'MainController@deleteColleges');
    Route::get('list/instructors/delete/{id}', 'MainController@deleteInstructors');
    Route::get('list/students/delete/{id}', 'MainController@deleteStudents');
    Route::get('list/instructors-courses/delete/{id}', 'MainController@deleteInstructorCourse');

    /* Routes :: Insert records into the database */
    //Route::post('add/admin', 'MainController@addAdmin');
    Route::post('add/admin', 'MainController@addAdmin');
    Route::post('add/college', 'MainController@addCollege');
    Route::post('add/instructor', 'MainController@addInstructor');
    Route::post('add-students', 'MainController@addStudents');
    Route::post('admin/instructor-course', 'MainController@assignInstructorsCourses');

    /* Routes :: Update records */
    Route::get('edit/admins/{id}', 'MainController@editAdmins');
    Route::post('edit/admins/{id}', 'MainController@updateAdmins');
    Route::get('edit/colleges/{id}', 'MainController@editColleges');
    Route::post('edit/colleges/{id}', 'MainController@updateColleges');
    Route::get('add/admin', function () {
        return view('add_admins');
    });
    Route::get('add/college', ['middleware' => ['auth', 'Admin'], function () {
        return view('add_colleges');
    }]);
    Route::get('add/instructor', function () {
        return view('add_instructors');
    });
    Route::get('student', function () {
        return view('student.home');
    });
    Route::get('instructor', function () {
        return view('instructor.home');
    });
    Route::get('list/courses', function () {
        $courses = App\Course::all();
        return View::make('view_courses')->with('courses', $courses);
    });
});
