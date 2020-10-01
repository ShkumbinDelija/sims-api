@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-header">
                Create Courses
            </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            {!! Form::open(['action' => 'API\CourseController@store','method' => 'POST']) !!}
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Code</label>
                <input type="text" name="code" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Create</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection