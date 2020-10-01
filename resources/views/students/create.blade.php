@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-header">Create students</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            {{Form::open(['action' => 'API\StudentController@store','method' => 'POST'])}}
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Create</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection