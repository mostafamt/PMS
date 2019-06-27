@extends('layouts.app')

@section('content')
<div class="container">
    <legend>Tasks</legend>
    @if(count($tasks))
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Task</th>
                <th scope="col">Status</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <th scope="row">{!! $counter++ !!}</th>
                <td><a
                        href="{!! action('TaskController@edit' , [ 'project_id' => $task->project_id , 'task_id' => $task->id ] ) !!}">
                        {!! $task->name !!}</a>
                </td>
                <td>{!! $task->status !!}</td>
                <td>{!! $task->start_date !!}</td>
                <td>{!! $task->end_date !!}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>You don't have any tasks yet .</p>
    @endif
</div>
@endsection
