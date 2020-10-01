<?php

namespace App\Http\Controllers\API;

use App\StudentExam;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller {
	public function index() {
		return response()->json( [
			User::all()
		] );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
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
		//
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

		return response()->json(['deleted']);
	}

	public function submit( Request $request, $exam, $student ) {
		StudentExam::create( [
			'exam_id'    => $exam,
			'student_id' => $student
		] );

		return back();
	}

	public function refuse( Request $request, $exam, $student ) {
		StudentExam::where( 'exam_id', $exam )->where( 'student_id', $student )->delete();

		return back();
	}
}
