@extends('layouts.app')

@section('content')
<head>
    <style>
        .start
        {
            font-family: sans-serif;
            margin-top: 20px;
        }
        .shows
        {
            margin-top: 20px;
        }
        .shows img
        {
            width: 100%;
            border-radius: 10%;
            height: 100%;
        }
    </style>
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome {{ Auth::user()->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>You are logged in ^_^</h3>
                </div>
                
            </div>
        </div>
        
            
    </div>
          <h1 class="start text-center">Start Your Work</h1>
    <div class="row text-center shows">
        
        <div class="col-md-4 text-center">
            <img src="images/Hiring%20manager%205%20sec.gif">    
        </div>
        <div class="col-md-4">
            <img src="images/we_re-hiring_loop.gif">
        </div>
        <div class="col-md-4">
            <img src="images/Tech_recruiter_loop.gif">
        </div>
    </div>
    
</div>
@endsection
