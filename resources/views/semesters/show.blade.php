@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-header">Update Semesters</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            {!! Form::open(['action' =>['API\SemesterController@update',$semester->id],'method' => 'POST']) !!}
            <input type="hidden" value="PUT" name="_method">
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" value="{{$semester->description}}" name="description" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Term</label>
                <select name="term" id="" class="form-control">
                    <option value="" selected disabled>--Please select an option--</option>
                    @foreach($terms as $term)
                        <option @if($term->id == $semester->term_id){{'selected'}} @endif value="{{$term->id}}">{{$term->description}}</option>
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