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
        <a href="/project/create" class="btn btn-success"><i class="fa fa-plus"></i> New Project</a>
    </div>
    <div class="row mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">project</th>

                    <th scope="col">before finish</th>
                    <th scope="col">after finish</th>
                    <th scope="col">status</th>
                </tr>
            </thead>
            <tbody>
                {{-- counter for all projects --}}
                <?php
                   $counter = 0 ;
                ?>
                @foreach ($projects as $project)
                <tr>
                    <th scope="row"><?php echo $counter=++$counter;  ?></th>

                    <td>
                        <a href="{!! action('ProjectController@edit' , $project->id) !!}">{!! $project->project_name
                            !!}</a>
                    </td>


                    <td>

                        <?php

                                        $date1=$project->end_date ;


                                        $date2= Carbon\Carbon::now();

                                        if($date1>$date2  && $project->isfinished==0){
                                        $s2=Carbon\Carbon::parse($date2)->diffForHumans(Carbon\Carbon::parse($date1));
                                        echo $s2;
                                        }

                                ?>
                    </td>


                    <td>
                        <?php

                                        $date1=$project->end_date ;


                                        $date2= Carbon\Carbon::now();
                                        if($date1<$date2 && $project->isfinished==0){
                                        $s2=Carbon\Carbon::parse($date2)->diffForHumans(Carbon\Carbon::parse($date1));
                                        echo $s2;
                                        }

                                ?>

                    </td>
                    <td>
                          <?php

                                        $date1=$project->end_date ;


                                        $date2= Carbon\Carbon::now();

                                        if($date1>$date2  && $project->isfinished==0){
                                        $s2=Carbon\Carbon::parse($date2)->diffForHumans(Carbon\Carbon::parse($date1));
                                        echo 'passive';
                                        }elseif($date1<$date2  && $project->isfinished==0){
                                        $s2=Carbon\Carbon::parse($date2)->diffForHumans(Carbon\Carbon::parse($date1));
                                        echo 'running';
                                        }else{
                                            echo 'finished';
                                        }

                                ?>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
