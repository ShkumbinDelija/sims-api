<?php

namespace App\Http\Controllers;

use App\Exam;
use App\StudentExam;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view( 'students.index',
			[
				'students' => User::all()
			] );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view( 'students.create' );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request ) {
		return response()->json( [
			User::create( [
				'name'      => $request->name,
				'email'     => $request->email,
				'password'  => bcrypt( $request->password ),
				'api_token' => str_random( 60 )
			] )
		] );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {
		return response()->json( [
			User::findOrFail( $id )
		] );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {
		return view( 'students.show', [ 'student' => User::findOrFail( $id ) ] );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, $id ) {
		$student = User::findOrFail( $id );
		$student->update( [
			'name'  => $request->name,
			'email' => $request->email
		] );

		return response()->json( [
			$student
		] );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( $id ) {
		User::findOrFail( $id )->delete();
	}

	public function exams() {
		return view( 'exams', [
			'exams' => Exam::whereIn( 'id', StudentExam::where( 'student_id', Auth::user()->id )->get()->pluck( 'id' )->toArray() )->get()
		] );
	}
}
