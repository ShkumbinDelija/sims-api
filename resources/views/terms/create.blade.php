@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-header">Create Terms</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            {!! Form::open(['action' => 'API\TermController@store','method' => 'POST']) !!}
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" name="description" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Create</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection