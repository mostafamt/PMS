<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projsch;

class projschController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projsch=Projsch::all();
        return view('projsch.create',compact('projsch'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $proj=new Projsch();
                 $proj->project_id=$request->input('Project');
                // $proj->user_id=Auth::user()->id;


        $proj->TaskName=$request->input('TaskName');
        $proj->DurationDays=$request->input('DurationDays');
        $proj->Dependance1=$request->input('Dependance1');
        $proj->Dependance2=$request->input('Dependance2');

        $proj->StartDate=$request->input('StartDate');
        $proj->endDate=$request->input('endDate');
        $proj->ActalEndDate=$request->input('ActalEndDate');
        $proj->projschadulingStatus=$request->input('status');


        $proj->save();
        return redirect(route('project.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
