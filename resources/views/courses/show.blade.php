@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-header">
                Update Courses
            </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            {!! Form::open(['action' => ['API\CourseController@update',$course->id],'method' => 'POST']) !!}
            <input type="hidden" value="PUT" name="_method">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" value="{{$course->name}}">
            </div>
            <div class="form-group">
                <label for="">Code</label>
                <input type="text" name="code" class="form-control" value="{{$course->code}}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Update</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection