@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post">
        @csrf
        @foreach ($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
    

        <legend>Create Project_schaduling</legend>
        <div class="form-group">
            <label for="formGroupExampleInput"> Project_schaduling_name</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Project_schaduling_name" name="name">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput"> DurationDays</label>
            <input type="number" class="form-control" id="formGroupExampleInput" placeholder="DurationDays" name="name">
        </div>

        <div class="form-group">
  <label for="exampleFormControlTextarea1">Dependance1</label>
        <select name="Dependance1"><br><br>
  @foreach($projsch as $project)
  <option value="{{$project->id}}"{{$project->ProjectName}}</option>
  @endforeach
</select>
</div>

 <div class="form-group">
  <label for="exampleFormControlTextarea1">Dependance2</label>
<select name="Dependance2"><br><br>
  @foreach($projsch as $project)
  <option value="{{$project->id}}"{{$project->ProjectName}}</option>
  @endforeach
</select>
</div>


        <div class="form-group">
            <!-- Date input -->
            <label class="control-label" for="date">Start Date</label>
            <input class="form-control" id="start_date" name="StartDate" placeholder="YYYY/MM/DD" type="date" />
        </div>

        <div class="form-group">
            <!-- Date input -->
            <label class="control-label" for="date">End Date</label>
            <input class="form-control" id="end_date" name="endDate" placeholder="YYYY/MM/DD" type="date" />
        </div>

       
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Status</label>
          <select name="projschadulingStatus"><br><br>
              <option value="Passive">Passive</option>
              <option value="Running">Running</option>
              <option value="Finished">Finished</option>
         </select>
     </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


{{-- 
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
--}}

    @endsection
