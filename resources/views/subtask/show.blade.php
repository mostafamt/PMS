


@extends('layouts.app')

@section('content')
<?php 
   
    use App\User;

?>

<div class="container">

    <div class="container col-md-10 col-md-offset-2">
        <div class="well well bs-component">
            <div class="content">
                <h1 class="header">{!! $task->name !!}</h1>
                <p><strong>Start Date :</strong> {!! $task->start_date !!}</p>
                <p><strong>End Date :</strong> {!! $task->end_date !!}</p>
                <p><strong>Description :</strong> {!! $task->description !!}</p>
                <p><strong>status :</strong> {!! $task->Status !!}</p>

                <form method="post">
                    @csrf
                    <a href=""
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
        <h2>task's of users</h2>
        <a href="{{ route('subtask_user',$task->id) }}" class="btn btn-success"><i
                class="fa fa-plus"></i>
            New Task for user</a>
       <div class="row mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Description</th>


                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($taskusers as $value)

<?php 
   
    $user=User::where('id',$value->user_id)->first();

?>


                    <tr>
                        <th scope="row">{!! $counter++ !!}</th>
                        <td>
                            <a
                                href="">
                                {!! $user->name !!}
                            </a>
                        </td>
                        <td>{!! $task->Status !!}</td>
                        <td>{!! $task->description !!}</td>

    
                   

                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    @endsection
