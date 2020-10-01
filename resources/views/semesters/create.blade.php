@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-header">Create Semesters</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            {!! Form::open(['action' => 'API\SemesterController@store','method' => 'POST']) !!}
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" name="description" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Term</label>
                <select name="term" id="" class="form-control">
                    <option value="" selected disabled>--Please select an option--</option>
                    @foreach($terms as $term)
                        <option value="{{$term->id}}">{{$term->description}}</option>
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