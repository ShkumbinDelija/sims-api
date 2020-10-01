@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-header">All Semesters</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Term</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($semesters as $semester)
                    <tr>
                        <td>{{$semester->description}}</td>
                        <td>{{\App\Term::where('id',$semester->term_id)->get()->count() == 0 ? $semester->term_id : \App\Term::find($semester->term_id)->description }}</td>
                        <td><a href="/semesters/edit/{{$semester->id}}" class="text-info"
                               style="border: none; background-color: inherit;"><i class="fa fa-edit"></i> Edit</a>
                            |
                            {!! Form::open(['action' => ['API\SemesterController@destroy',$semester->id],'method' => 'POST','style' => 'display:inline;']) !!}
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
        </div>
    </div>
@endsection
