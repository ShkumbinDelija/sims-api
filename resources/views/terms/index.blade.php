@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h4 class="page-header">All Terms</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($terms as $term)
                    <tr>
                        <td>{{$term->description}}</td>
                        <td><a href="/terms/edit/{{$term->id}}" class="text-info"
                               style="border: none; background-color: inherit;"><i class="fa fa-edit"></i> Edit</a>
                            |
                            {!! Form::open(['action' => ['API\TermController@destroy',$term->id],'method' => 'POST','style' => 'display:inline;']) !!}
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