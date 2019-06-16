@extends('layouts.app')

@section('content')



<div class="container col-md-8 col-md-offset-2">
    <div class="well well bs-component">
        <div class="content">
            <h2 class="header">{!! $project->project_name !!}</h2>
            <p><strong>Start Date :</strong> {!! $project->start_date !!}</p>
            <p><strong>End Date :</strong> {!! $project->end_date !!}</p>
            <p><strong>Description :</strong> {!! $project->description !!}</p>
            <form method="post">
                @csrf
                <a href="{!! action('ProjectController@update' , $project->id ) !!}" class="btn btn-success">Update</a>
                <button type="submit" class="btn btn-primary">Delete</button>
            </form>

        </div>
    </div>
</div>





@endsection
