@extends('layouts.app')

@section('content')

<div class="container">

    <div class="container col-md-10 col-md-offset-2">
        <div class="well well bs-component">
            <div class="content">
                <h2 class="header">{!! $project->project_name !!}</h2>
                <p><strong>Start Date :</strong> {!! $project->start_date !!}</p>
                <p><strong>End Date :</strong> {!! $project->end_date !!}</p>
                <p><strong>Description :</strong> {!! $project->description !!}</p>
                <form method="post">
                    @csrf
                    <a href="{!! action('ProjectController@update' , $project->id ) !!}"
                        class="btn btn-primary">Update</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>

            </div>
        </div>
    </div>

    <div class="container col-md-10 col-md-offset-2">
        <hr>
        {{-- <i class="fa fa-plus"> --}}
        <h1>Tasks</h1>
        <a href="{!! action('TaskController@create' , $project->id ) !!}" class="btn btn-success"><i class="fa fa-plus"></i> New Task</a>
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
                    <tr>
                        <th scope="row">1</th>
                        <td>
                            Name
                        </td>
                        <td>t1</td>
                        <td>t2</td>
                        <td>Any thing</td>
                    </tr>
                </tbody>
            </table>

        </div>



    </div>

    @endsection
