@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-header">Showing all students</h4>
        </div>
    </div>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Firstname</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{$student->name}}</td>
                <td>{{$student->email}}</td>
                <td><a href="/students/edit/{{$student->id}}" class="text-info"
                       style="border: none; background-color: inherit;"><i class="fa fa-edit"></i> Edit</a>
                    |
                    {!! Form::open(['action' => ['API\StudentController@destroy',$student->id],'method' => 'POST','style' => 'display:inline;']) !!}
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