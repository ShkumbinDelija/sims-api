@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-header">Update Student</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            {!! Form::open(['action' => ['API\StudentController@update' , $student->id], 'method' => 'POST']) !!}
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" value="{{$student->name}}">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" value="{{$student->email}}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Update</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection