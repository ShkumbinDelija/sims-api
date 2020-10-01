@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-header">Update Exams</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            {!! Form::open(['action' => ['API\ExamController@update',$exam->id],'method' => 'POST']) !!}
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="">Course</label>
                <select name="course" class="form-control" id="">
                    <option value="" selected disabled>--Select an option--</option>
                    @foreach($courses as $course)
                        <option @if($course->id == $exam->course_id){{'selected'}}@endif value="{{$course->id}}">{{$course->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Semester</label>
                <select name="semester" class="form-control" id="">
                    <option value="" selected disabled>--Select an option--</option>
                    @foreach($semesters as $semester)
                        <option @if($semester->id == $exam->semester_id){{'selected'}}@endif value="{{$semester->id}}">{{$semester->description}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Update</button>
            </div>
            {!! Form::close() !!}

        </div>
    </div>
@endsection