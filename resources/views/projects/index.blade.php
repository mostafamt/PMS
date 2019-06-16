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
        <a href="/project/create" class="btn btn-success">New Project</a>
    </div>
    <div class="row mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Project Name</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <th scope="row">{!! $project->id !!}</th>
                    <td>
                        <a href="{!! action('ProjectController@edit' , $project->id) !!}">{!! $project->project_name
                            !!}</a>
                    </td>
                    <td>{!! $project->start_date !!}</td>
                    <td>{!! $project->end_date !!}</td>
                    <td>{!! $project->description !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
