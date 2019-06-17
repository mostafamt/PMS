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
        <legend>Create Department</legend>
        <div class="form-group">
            <label for="formGroupExampleInput">Department Name</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="name">
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>



    @endsection
