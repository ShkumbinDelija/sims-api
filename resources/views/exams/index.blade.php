@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-header">All Exams</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Course</th>
                    <th>Semester</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($exams as $exam)
                    <tr>
                        <td>{{\App\Course::where('id',$exam->course_id)->get()->count() == 0 ?
                        $exam->course_id : \App\Course::find($exam->course_id)->name}}</td>
                        <td>{{\App\Semester::where('id',$exam->semester_id)->get()->count() == 0 ?
                        $exam->course_id : \App\Semester::find($exam->semester_id)->description}}</td>
                        <td><a href="/exams/edit/{{$exam->id}}" class="text-info"
                               style="border: none; background-color: inherit;"><i class="fa fa-edit"></i> Edit</a>
                            |
                            {!! Form::open(['action' => ['API\ExamController@destroy',$exam->id],'method' => 'POST','style' => 'display:inline;']) !!}
                            <input type="hidden" value="DELETE" name="_method">
                            <button class="text-danger" style="border:none;background-color: inherit;"><i
                                        class="fa fa-trash"></i> Delete
                            </button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection