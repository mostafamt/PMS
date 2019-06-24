<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User ;

class MemberController extends Controller
{
    //

    public function index()
    {
        $counter = 1 ;
        $users = User::all();
        return view('members.index' , compact('users' , 'counter'));
    }
  
    public function show($username)
    {
        $user = User::Where('user_name', $username)->firstOrFail();
        return view('members.view' , compact('user'));
    }

}
