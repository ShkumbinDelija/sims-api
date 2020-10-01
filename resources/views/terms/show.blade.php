@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-header">Update Terms</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            {!! Form::open(['action' => ['API\TermController@update',$term->id],'method' => 'POST']) !!}
            <input type="hidden" value="PUT" name="_method">
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" value="{{$term->description}}" name="description" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Update</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection