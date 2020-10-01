<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Semester;
use App\StudentExam;
use App\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TermController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view( 'terms.index', [
			'terms' => Term::all()
		] );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view( 'terms.create' );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request ) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {
		$already_enrolled_in = StudentExam::where( 'student_id', Auth::user()->id )->get()->pluck( 'exam_id' )->toArray();

		$term         = Term::findOrFail( $id );
		$semester_ids = Semester::where( 'term_id', $term->id )->get()->pluck( 'id' )->toArray();
		$exams        = Exam::whereIn( 'semester_id', $semester_ids )->whereNotIn('id',$already_enrolled_in)->get();

		return view( 'term', [ 'exams' => $exams, 'term' => $term ] );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {
		return view( 'terms.show', [
			'term' => Term::findOrFail( $id )
		] );
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
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( $id ) {
		//
	}
}
