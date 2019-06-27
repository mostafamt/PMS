@extends('layouts.app')

@section('content')


<head>
    <style>
        .profile-head h5
        {
            color: #333;
            margin-bottom: 15px;
        }
        .profile-head h6{
            color: #0062cc;
            margin-bottom: 15px;
        }


        .profile-img .file  select, textarea
        {
            opacity: 0;
            width: 80%;
            float: left;
            cursor: pointer;
        }
        .profile-img
        {
            position: relative;
        }
        .profile-img img
        {
            width: 80%;
            height: 70%;

        }
        .profile-img .file
        {
            overflow: hidden;
            width: 80%;
            border-radius: 0 0 10px 10px ;
            border: none;
            padding: 2%;
            font-weight:600;
            color: #5c555d;
            cursor: pointer;

        }
        .profile-edit-btn
        {
            border: none;
            border-radius: 1.5rem;
            width: 70%;
            padding: 2%;
            font-weight: 500;
            font-size: 17px;
            color: #5c555d;
            cursor: pointer;
        }

        .profile-tab label
        {
           font-weight: 600;
        }
        .profile-tab p
        {
            font-weight: 500;
            font-size: 17px;
            color: #0062cc;
        }
    </style>
</head>

<div class="container emp-profile">
            <form method="get">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="/images/one.jpg" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                <input type="file" name="file" value="Change Photo"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        {!! $user->name !!}
                                    </h5>
                                    <h6>
                                        Web Developer and Designer
                                    </h6>

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="profile-edit-btn btn-primary" name="btnAddMore" value="Edit Profile"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">

                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> {!! $user->user_name !!}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> {!! $user->name !!}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> {!! $user->email !!}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> {!! $user->mobile !!}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Addres</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> {!! $user->address !!}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Job</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> {!! $user->account !!}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Department</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p> {!! $user->department !!}
                                                </p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Experience</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Hourly Rate</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>10$/hr</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Total Projects</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>230</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>English Level</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Availability</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>6 months</p>
                                            </div>
                                        </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Your Bio</label><br/>
                                        <p>Your detail description</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

@endsection
