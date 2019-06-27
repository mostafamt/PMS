@extends('layouts.app')


@section('content')
<div class="container">
    <legend>Subtasks</legend>
    @if(count($subtasks))
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Subtask</th>
                <th scope="col">Status</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subtasks as $subtask)
            <tr>
                <th scope="row">{!! $counter++ !!}</th>
                <td>
                    <a href="{{ route('subtask_show',$subtask->id) }}">
                        {!! $subtask->name !!}
                    </a>
                </td>
                <td>{!! $subtask->Status !!}</td>
                <td>{!! $subtask->start_date !!}</td>
                <td>{!! $subtask->end_date !!}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>You don't have any subtasks yet .</p>
    @endif
</div>

@endsection
