@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($errors->all() as $error)
    <p class="alert alert-danger">{{ $error }}</p>
    @endforeach
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="row">
        <a href="/project/create" class="btn btn-success">New Project</a>
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
                @foreach ($projects as $project)
                <tr>
                    <th scope="row">{!! $project->id !!}</th>
                    <td>
                        <a href="{!! action('ProjectController@edit' , $project->id) !!}">{!! $project->project_name
                            !!}</a>
                    </td>
                    
                     
                    <td>
                        
                        <?php

                                        $date1=$project->end_date ;


                                        $date2=$project->start_date ;

                                        if($date1>$date2){
                                        $s2=Carbon\Carbon::parse($date2)->diffForHumans(Carbon\Carbon::parse($date1));
                                        echo $s2;
                                        }

                                ?>
                    </td>
                     
                    
                    <td> 
                        <?php

                                        $date1=$project->end_date ;


                                        $date2=$project->start_date ;

                                        if($date1<$date2){
                                        $s2=Carbon\Carbon::parse($date2)->diffForHumans(Carbon\Carbon::parse($date1));
                                        echo $s2;
                                        }

                                ?>
                                    
                    </td>
                    <td>{!! $project->description !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
