@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" action="{{ route('subtask.store',$task->id) }}">
        @csrf
        @foreach ($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        @if (session('danger'))
        <div class="alert alert-dinger alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <legend>Create Subtask</legend>
        <div class="form-group">
            <label for="formGroupExampleInput">Subtask Name</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Task Name" name="name">
        </div>

        <div class="form-group">
            <!-- Date input -->
            <label class="control-label" for="date">Start Date</label>
            <input class="form-control" id="start_date" name="start_date" placeholder="YYYY/MM/DD" type="text" />
        </div>

        <div class="form-group">
            <!-- Date input -->
            <label class="control-label" for="date">End Date</label>
            <input class="form-control" id="end_date" name="end_date" placeholder="YYYY/MM/DD" type="text" />
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput">Employee Username</label>
            <input type="text" class="form-control" id="username" placeholder="Employee Username"
                name="username">
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>



    <script>
        $(document).ready(function(){
                      var start_date=$('input[id="start_date"]'); //our date input has the name "date"
                      var end_date=$('input[id="end_date"]');
                      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
                      var options={
                        format: 'yyyy/mm/dd',
                        container: container,
                        todayHighlight: true,
                        autoclose: true,
                      };
                      start_date.datepicker(options);
                      end_date.datepicker(options);
                    });
    </script>
    @endsection
