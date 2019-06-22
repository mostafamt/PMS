@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" action="{{ route('savesupervisor',$task->id) }}">
         <input type="hidden" name="_method" value="PUT">

        @csrf
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $error }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
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
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('danger') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

       



















        <legend>Add Super Visor</legend>
        <div class="form-group">
           
            <input type="hidden" class="form-control" id="formGroupExampleInput" placeholder="Project Name" name="name"
                value="{!! $task->name !!}">
        
          <div class="form-group">
            <label for="formGroupExampleInput">User Name</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="user name of super visor" name="supervisor">
               
        </div>

            <input  name="project" value="{{ $project->id }}"  type="hidden" />

            
        <div class="form-group">
            <!-- Date input -->
          
            <input class="form-control" id="start_date" name="start_date" value="{!! $project->start_date !!}"
                type="hidden" />
        </div>

        <div class="form-group">
            <!-- Date input -->
           
            <input class="form-control" id="end_date" name="end_date" value="{!! $project->end_date !!}"
                type="hidden" />
        </div>


{{--
            <!-- Date input -->
           
            <input class="form-control" id="start_date" name="start_date" value="{!! $task->start_date !!}" 
                type="hidden" />
      

     
            <input class="form-control" id="end_date" name="end_date" value="{!! $task->end_date !!}"
                type="hidden" />
      

       --}}
         
             <input class="form-control" id="end_date" name="desc" value="{!! $task->description !!}"  type="hidden" />
           
       

        

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

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
