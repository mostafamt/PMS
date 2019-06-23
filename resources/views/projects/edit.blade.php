<?php

  use App\Task;
  use App\User;

?>


@extends('layouts.app')

@section('content')

<div class="container">

    <div class="container col-md-10 col-md-offset-2">
        <div class="well well bs-component">
            <div class="content">
                <h1 class="header">{!! $project->project_name !!}</h1>
                <p><strong>Start Date :</strong> {!! $project->start_date !!}</p>
                <p><strong>End Date :</strong> {!! $project->end_date !!}</p>
                <p><strong>Description :</strong> {!! $project->description !!}</p>
                <form method="post">
                    @csrf
                    <a href="{!! action('ProjectController@update' , $project->id ) !!}"
                        class="btn btn-primary">Edit</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>

            </div>
        </div>
    </div>

    <div class="container col-md-10 col-md-offset-2">
        <hr>
        @foreach ($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <h2>Tasks</h2>
        <a href="{!! action('TaskController@create' , $project->id ) !!}" class="btn btn-success"><i
                class="fa fa-plus"></i>
            New Task</a>
        <div class="row mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Task Name</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Status</th>


                        <th scope="col">Super Visor</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <th scope="row">{!! $counter++ !!}</th>
                        <td>
                            <a
                                href="{!! action('TaskController@edit' , [ 'project_id' => $project->id , 'task_id' => $task->id ] ) !!}">
                                {!! $task->name !!}
                            </a>
                        </td>
                        <td>{!! $task->start_date !!}</td>
                        <td>{!! $task->end_date !!}</td>
                        <td>{!! $task->status !!}</td>


  {{--to add super visor name--}}
<?php
  $user=User::where('id',$task->user_id)->first();
  if($task->user_id==null){
      ?> <td>  <a href="{{ route('addsupervisor',$task->id) }}" > Add Super Visor </a>  </td> <?php
  }else{
      echo "<td> $user->name </td>" ;
  }

?>


                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    @endsection
