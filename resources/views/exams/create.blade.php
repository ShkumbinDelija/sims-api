@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-header">Create Exams</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            {!! Form::open(['action' => 'API\ExamController@store','method' => 'POST']) !!}
            <div class="form-group">
                <label for="">Course</label>
                <select name="course" class="form-control" id="">
                    <option value="" selected disabled>--Select an option--</option>
                    @foreach($courses as $course)
                        <option value="{{$course->id}}">{{$course->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Semester</label>
                <select name="semester" class="form-control" id="">
                    <option value="" selected disabled>--Select an option--</option>
                    @foreach($semesters as $semester)
                        <option value="{{$semester->id}}">{{$semester->description}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Create</button>
            </div>
            {!! Form::close() !!}

        </div>
    </div>
@endsection