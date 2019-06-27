@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($errors->all() as $error)
    <p class="alert alert-danger">{{ $error }}</p>
    @endforeach
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="row">
        <a href="/project/create" class="btn btn-primary"><i class="fa fa-plus"></i> New Project</a>
    </div>
    @if($length == 0 )
    <br>
    <div class="row">
        <p>You don't have any project yet .</p>
    </div>
    @else
    <div class="row mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">project</th>
                    <th scope="col">Status</th>
                    <th scope="col">Time to finish</th>
                </tr>
            </thead>
            <tbody>
                    @for($i = 0 ; $i < $length ; $i++)
                        @if ($projects[$i]->status == 'Finished')
                            <tr class="table-success">
                                <th scope="row">{!! $i+1 !!}</th>
                                <td>
                                    <a href="{!! action('ProjectController@edit' , $projects[$i]->id) !!}">
                                        {!! $projects[$i]->project_name !!}
                                    </a>
                                </td>
                                <td>{!! $projects[$i]->status !!}</td>
                                <td>{!! $time_to_finish[$i] !!}</td>
                            </tr>
                        @elseif ($projects[$i]->status == 'Passive')
                            <tr class="table-danger">
                                <th scope="row">{!! $i+1 !!}</th>
                                <td>
                                    <a href="{!! action('ProjectController@edit' , $projects[$i]->id) !!}">
                                        {!! $projects[$i]->project_name !!}
                                    </a>
                                </td>
                                <td>{!! $projects[$i]->status !!}</td>
                                <td>{!! $time_to_finish[$i] !!}</td>
                            </tr>
                        @else
                            <tr">
                                <th scope="row">{!! $i+1 !!}</th>
                                <td>
                                    <a href="{!! action('ProjectController@edit' , $projects[$i]->id) !!}">
                                        {!! $projects[$i]->project_name !!}
                                    </a>
                                </td>
                                <td>{!! $projects[$i]->status !!}</td>
                                <td>{!! $time_to_finish[$i] !!}</td>
                            </tr>
                        @endif
                @endfor
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection
