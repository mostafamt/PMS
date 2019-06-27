@extends('layouts.app')

@section('content')

<div class="container">
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
    <div class="container col-md-10 col-md-offset-2">
        <div class="well well bs-component">
            <div class="content">
                <h1 class="header">{!! $subtask->name !!}</h1>
                <p><strong>Start Date :</strong> {!! $subtask->start_date !!}</p>
                <p><strong>End Date :</strong> {!! $subtask->end_date !!}</p>
                <p><strong>Description :</strong> {!! $subtask->description !!}</p>
                <p><strong>status :</strong> {!! $subtask->Status !!}</p>
                <hr>

                @if( $is_subtask_belongs_to_this_employee )

                <form method="POST" action="{!! action('subtaskController@finish' , $subtask->id ) !!}">
                    @csrf
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="status" {!!
                            $subtask->Status == 'Finished' ?"checked":""!!}>
                        <label class="form-check-label" for="exampleCheck1">Finish this subtask ?</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                @else
                @if($subtask->Status=='waiting')
                <form method="post" action="{{ route('subtask_running',$subtask->id) }}">
                    @csrf
                    <input type="hidden" name="status" value="Running">

                    <button type="submit" class="btn btn-primary">Running</button>

                </form><br>
                @endif

                <form method="post">
                    @csrf
                    <a href="" class="btn btn-primary">Edit</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                @endif
            </div>
        </div>
    </div>


    @endsection
