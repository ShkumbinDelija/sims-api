<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get( '/', function () {
	return view( 'index' );
} );

Route::get( '/student', function () {
	return view( 'student', [ 'terms' => \App\Term::all() ] );
} )->middleware( 'auth' );

Route::get( '/term/{id}', 'TermController@show' );

Route::group( [ 'prefix' => 'students' ], function () {
	Route::get( '/', 'StudentController@index' );
	Route::get( '/create', 'StudentController@create' );
	Route::get( '/edit/{id}', 'StudentController@edit' );
	Route::get( '/exams/', 'StudentController@exams' );
} );
Route::group( [ 'prefix' => 'courses' ], function () {
	Route::get( '/', 'CourseController@index' );
	Route::get( '/create', 'CourseController@create' );
	Route::get( '/edit/{id}', 'CourseController@edit' );
} );
Route::group( [ 'prefix' => 'terms' ], function () {
	Route::get( '/', 'TermController@index' );
	Route::get( '/create', 'TermController@create' );
	Route::get( '/edit/{id}', 'TermController@edit' );
} );
Route::group( [ 'prefix' => 'exams' ], function () {
	Route::get( '/', 'ExamController@index' );
	Route::get( '/create', 'ExamController@create' );
	Route::get( '/edit/{id}', 'ExamController@edit' );
} );
Route::group( [ 'prefix' => 'semesters' ], function () {
	Route::get( '/', 'SemesterController@index' );
	Route::get( '/create', 'SemesterController@create' );
	Route::get( '/edit/{id}', 'SemesterController@edit' );
} );

Route::get( '/home', 'HomeController@index' )->name( 'home' );
