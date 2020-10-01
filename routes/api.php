<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware( 'auth:api' )->get( '/user', function ( Request $request ) {
	return $request->user();
} );

Route::group( [ 'prefix' => 'courses' ], function () {
	Route::get('/','API\CourseController@index');
	Route::post( '/store', 'API\CourseController@store' );
	Route::delete( '/delete/{id}', 'API\CourseController@destroy' );
	Route::put( '/update/{id}', 'API\CourseController@update' );
} );
Route::group( [ 'prefix' => 'semesters' ], function () {
	Route::post( '/store', 'API\SemesterController@store' );
	Route::delete( '/delete/{id}', 'API\SemesterController@destroy' );
	Route::put( '/update/{id}', 'API\SemesterController@update' );
} );
Route::group( [ 'prefix' => 'exams' ], function () {
	Route::post( '/store', 'API\ExamController@store' );
	Route::delete( '/delete/{id}', 'API\ExamController@destroy' );
	Route::put( '/update/{id}', 'API\ExamController@update' );
} );
Route::group( [ 'prefix' => 'terms' ], function () {
	Route::post( '/store', 'API\TermController@store' );
	Route::delete( '/delete/{id}', 'API\TermController@destroy' );
	Route::put( '/update/{id}', 'API\TermController@update' );
} );
Route::group( [ 'prefix' => 'students' ], function () {
	Route::post( '/store/', 'API\StudentController@store' );
	Route::put( '/update/{id}', 'API\StudentController@update' );
	Route::delete( '/delete/{id}', 'API\StudentController@destroy' );
	Route::post( '/submit/{exam}/{student}', 'API\StudentController@submit' );
	Route::delete( '/refuse/{exam}/{student}', 'API\StudentController@refuse' );
} );
