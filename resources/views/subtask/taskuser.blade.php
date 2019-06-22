@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" action="{{ route('subtask_saveusertask',$task->id) }}">
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
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('danger') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        
        <legend>Create Task for user</legend>
        

        <div class="form-group">
            <!-- Date input -->
            <label class="control-label" for="date">User Name</label>
            <input class="form-control"  name="username" placeholder="user name" type="text" />
        </div>


            <input   name="task" value="{{ $task->id }}" type="hidden" />


       

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
