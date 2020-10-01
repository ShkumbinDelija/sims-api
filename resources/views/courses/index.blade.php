@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-header">
                All Courses
            </h4>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Code</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($courses as $course)
            <tr>
                <td>{{$course->name}}</td>
                <td>{{$course->code}}</td>
                <td><a href="/courses/edit/{{$course->id}}" class="text-info"
                       style="border: none; background-color: inherit;"><i class="fa fa-edit"></i> Edit</a>
                    |
                    {!! Form::open(['action' => ['API\CourseController@destroy',$course->id],'method' => 'POST','style' => 'display:inline;']) !!}
                    <input type="hidden" value="DELETE" name="_method">
                    <button class="text-danger" style="border:none;background-color: inherit;"><i
                                class="fa fa-trash"></i> Delete
                    </button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection