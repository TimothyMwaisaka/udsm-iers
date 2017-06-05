<?php

Route::auth();

Route::group(['middleware' => ['auth', 'web', 'roles']], function () {
    /* Routes :: Login, Register and Logout */
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');
    Route::get('auth/register', 'Auth\AuthController@getRegister');
    Route::post('auth/register', 'Auth\AuthController@getRegister');

    /* Routes :: Homepage - Welcome page */
    Route::get('/', function () {
        return view('welcome');
    });

    /* Routes :: Get records from the database */
    Route::get('list/admins', [
        'uses' => 'MainController@getAdmins',
        'roles' => ['Admin']
    ]);
    Route::get('list/instructors', [
        'uses' => 'MainController@getInstructors',
        'roles' => ['Admin']
    ]);
    Route::get('list/students', [
        'uses' => 'MainController@getStudents',
        'roles' => ['Admin']
    ]);
    Route::get('list/students/{id}', [
        'uses' => 'MainController@showStudentDetails',
        'roles' => ['Admin']
    ]);
    Route::get('list/colleges', [
        'uses' => 'MainController@getColleges',
        'roles' => ['Admin']
    ]);
    Route::get('list/courses', [
        'uses' => 'MainController@getCourses',
        'roles' => ['Admin']
    ]);
    Route::get('list/forms', [
        'uses' => 'MainController@getForms',
        'roles' => ['Admin', 'Instructor']
    ]);
    Route::get('list/forms/{id}', [
        'as' => 'list/forms/{id}',
        'uses' => 'MainController@showForms',
        'roles' => ['Admin', 'Student', 'Instructor']
    ]);

    Route::get('admin/instructor-course', [
        'uses' => 'MainController@getInstructorsCourses',
        'roles' => ['Admin']
    ]);
    Route::get('admin/student-course', [
        'uses' => 'MainController@getStudentsCourses',
        'roles' => ['Admin']
    ]);
    Route::get('list/instructors-courses', [
        'uses' => 'MainController@showInstructorsCourses',
        'roles' => ['Admin']
    ]);
    Route::get('list/students-courses', [
        'uses' => 'MainController@showStudentsCourses',
        'roles' => ['Admin']
    ]);
    Route::get('add/student', [
        'uses' => 'MainController@getStudentsColleges',
        'roles' => ['Admin']
    ]);
    Route::get('add/instructor', [
        'uses' => 'MainController@getInstructorsColleges',
        'roles' => ['Admin']
    ]);
    Route::get('report', [
        'uses' => 'ReportController@reports',
        'roles' => ['Admin']
    ]);
    Route::get('add/form', [
        'uses' => 'FormController@show',
        'roles' => ['Admin']
    ]);

    /* Routes :: Delete records from the database */
    Route::get('list/admins/delete/{id}', [
        'uses' => 'MainController@deleteAdmins',
        'roles' => ['Admin']
    ]);
    Route::get('list/colleges/delete/{id}', [
        'uses' => 'MainController@deleteColleges',
        'roles' => ['Admin']
    ]);
    Route::get('list/instructors/delete/{id}', [
        'uses' => 'MainController@deleteInstructors',
        'roles' => ['Admin']
    ]);
    Route::get('list/students/delete/{id}', [
        'uses' => 'MainController@deleteStudents',
        'roles' => ['Admin']
    ]);
    Route::get('list/instructors-courses/delete/{id}', [
        'uses' => 'MainController@deleteInstructorCourse',
        'roles' => ['Admin']
    ]);
    Route::get('list/forms/delete/{id}', [
        'uses' => 'MainController@deleteForms',
        'roles' => ['Admin']
    ]);

    /* Routes :: Insert records into the database */
    Route::post('add/student', [
        'uses' => 'MainController@addStudent',
        'roles' => ['Admin']
    ]);
    Route::post('add/instructor', [
        'uses' => 'MainController@addInstructor',
        'roles' => ['Admin']
    ]);

    Route::post('add/user', [
        'uses' => 'MainController@addUser',
        'roles' => ['Admin']
    ]);
    Route::post('add/admin', [
        'uses' => 'MainController@addAdmin',
        'roles' => ['Admin']
    ]);
    Route::post('add/college', [
        'uses' => 'MainController@addCollege',
        'roles' => ['Admin']
    ]);
    Route::post('admin/instructor-course', [
        'uses' => 'MainController@assignInstructorsCourses',
        'roles' => ['Admin']
    ]);
    Route::post('admin/student-course', [
        'uses' => 'MainController@assignStudentsCourses',
        'roles' => ['Admin']
    ]);
    Route::post('add/form', [
        'uses' => 'FormController@store',
        'roles' => ['Admin']
    ]);
    Route::post('add/question', [
        'uses' => 'QuestionController@store',
        'roles' => ['Admin']
    ]);
    Route::post('list/forms/{id}', [
        'uses' => 'MainController@addRating',
        'roles' => ['Admin', 'Student', 'Instructor']
    ]);

    /* Routes :: Update records */
    Route::get('edit/admins/{id}', [
        'uses' => 'MainController@editAdmins',
        'roles' => ['Admin']
    ]);
    Route::post('edit/admins/{id}', [
        'uses' => 'MainController@updateAdmins',
        'roles' => ['Admin']
    ]);
    Route::get('edit/colleges/{id}', [
        'uses' => 'MainController@editColleges',
        'roles' => ['Admin']
    ]);
    Route::post('edit/colleges/{id}', [
        'uses' => 'MainController@updateColleges',
        'roles' => ['Admin']
    ]);

    /* Routes :: Index pages */
    Route::get('profile', [
        'uses' => 'ProfileController@index',
        'roles' => ['Admin', 'Student', 'Instructor']
    ]);
    Route::get('add/admin', [
        'uses' => 'MainController@addAdminIndex',
        'roles' => ['Admin']
    ]);
    Route::get('add/college', [
        'uses' => 'MainController@addCollegeIndex',
        'roles' => ['Admin']
    ]);
    Route::get('admin', [
        'uses' => 'MainController@adminIndex',
        'roles' => ['Admin']
    ]);
    Route::get('student', [
        'uses' => 'MainController@studentIndex',
        'roles' => ['Admin', 'Student']
    ]);
    Route::get('instructor', [
        'uses' => 'MainController@instructorIndex',
        'roles' => ['Admin', 'Instructor']
    ]);
    Route::get('add/question', [
        'uses' => 'MainController@addQuestionIndex',
        'roles' => ['Admin']
    ]);
});
