@extends('layouts.app')

@section('content')
<div class="container">



<div class="container col-md-8 col-md-offset-2">
    <div class="well well bs-component">
        <div class="content">
            <h2 class="header">{!! $project->project_name !!}</h2>
            <p><strong>Start Date :</strong> {!! $project->start_date !!}</p>
            <p><strong>End Date :</strong> {!! $project->end_date !!}</p>
            <p><strong>Description :</strong> {!! $project->description !!}</p>
            <form method="post">
                @csrf
                <a href="{!! action('ProjectController@update' , $project->id ) !!}" class="btn btn-success">Update</a>
                <button type="submit" class="btn btn-primary">Delete</button>
            </form>

        </div>
    </div>
</div>

 <div class="row mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">project</th>

                    <th scope="col">before finish</th>
                    <th scope="col">after finish</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                {{-- counter for all projects --}}
                <?php
                   $counter = 0 ;
                ?>
               
                <tr>
                    <th scope="row"><?php echo $counter=++$counter;  ?></th>
                    <td>
                        <a href=""> hello</a>
                           
                    </td>
                    
                     
                    <td>
                        
                       t1
                    </td>
                     
                    
                    <td> 
                       t2
                                    
                    </td>
                    <td>t3</td>
                </tr>
              
            </tbody>
        </table>
    </div>
</div>





@endsection
