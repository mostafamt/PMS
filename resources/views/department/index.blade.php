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
        <a href="/department/create" class="btn btn-primary"><i class="fa fa-plus"></i> New Department</a>
    </div>
    <div class="row mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Department Name</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                <tr>
                    <th scope="row">{!! $counter++ !!}</th>
                    <td>
                        <a href="{!! action('DepartmentController@edit' , $department->id ) !!}">{!! $department->name !!}</a>
                    </td>
                    <td>{!! $department->description !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
