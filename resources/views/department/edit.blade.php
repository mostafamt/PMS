@extends('layouts.app')

@section('content')


<div class="container col-md-8 col-md-offset-2">
    <div class="well well bs-component">
        <div class="content">
            <h2 class="header">{!! $department->name !!}</h2>
            <p><strong>Description :</strong> {!! $department->description !!}</p>
            <form method="post">
                @csrf
                <a href="{!! action('DepartmentController@update' , $department->id ) !!}" class="btn btn-success">Update</a>
                <button type="submit" class="btn btn-primary">Delete</button>
            </form>

        </div>
    </div>
</div>

@endsection
