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
    <legend>Members</legend>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Email</th> 
                    <th scope="col">Type Of Member</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{!! $counter++ !!}</th>
                                   
                    <td>
                    <a href="{!! action('MemberController@show' , $user->user_name) !!}">
                    {!! $user->name !!}</a>
                   </td>
                    <td>{!! $user->user_name !!}</td>
                    <td>{!! $user->mobile !!}</td>
                    <td>{!! $user->email !!}</td>
                    @if($user->account == 0 )
                    <td>ProjectOwner</td>
                    @elseif( $user->account == 1)
                    <td>SuperVisor</td>
                    @else
                    <td>Emplyee</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
