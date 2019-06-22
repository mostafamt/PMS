


@extends('layouts.app')

@section('content')
 @if (session('statuss'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('statuss') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

<div class="container">
    

    <div class="container col-md-10 col-md-offset-2">
        <div class="well well bs-component">
            <div class="content">
                <h1 class="header">{!! $task->name !!}</h1>
                <p><strong>Start Date :</strong> {!! $task->start_date !!}</p>
                <p><strong>End Date :</strong> {!! $task->end_date !!}</p>
                <p><strong>Description :</strong> {!! $task->description !!}</p>
                <p><strong>Status :</strong>     {!! $task->status !!}</p>

                <p><strong>Dependence1 :</strong> {!! $task->dependence1 !!}</p>
                <p><strong>Dependence2 :</strong> {!! $task->dependence2 !!}</p>
                @if($task->status=='waiting')
     <form method="post" action="{{  route('Running',$task->id) }}">
         @csrf
                 <input type="hidden" name="status" value="Running">

                <button type="submit" class="btn btn-primary">Running</button>
                
     </form><br>
     @endif
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
         @if (session('danger'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <h2>Sub Tasks</h2>
        <a href="{!! route('subtask.create' , $task->id ) !!}" class="btn btn-success"><i
                class="fa fa-plus"></i>
            New Sub Task</a>
       <div class="row mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                       {{-- <th scope="col">Description</th> --}}


                    </tr>
                </thead>
                <tbody>
                    @foreach ($subtask as $task)
                    <tr>
                        <th scope="row">{!! $counter++ !!}</th>
                        <td>
                            <a
                                href="{{ route('subtask_show',$task->id) }}">
                                {!! $task->name !!}
                            </a>
                        </td>
                        <td>{!! $task->start_date !!}</td>
                        <td>{!! $task->end_date !!}</td>
                       {{-- <td>{!! $task->description !!}</td> --}}

    
                   

                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    @endsection
