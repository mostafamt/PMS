<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project ;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProjectFormRequest;
use App\Http\Requests\ProjectUpdateFormRequest;
use App\Http\Requests\ProjectCreateFormRequest;

define('PASSIVE' , '1');
define('RUNNING' , '2');
define('FINISHED', '3');

class ProjectController extends Controller
{
    //

    public function create()
    {
        return view('projects.create');
    }

    public function store(ProjectCreateFormRequest $request)
    {
        $project=new Project();
        $project->user_id=Auth::user()->id;
        $project->project_name=$request->input('name');
        $project->description=$request->input('description');
        $project->start_date=$request->input('start_date');
        $project->end_date=$request->input('end_date');

        $project->save();
        return redirect('/project/create')->with('status' , 'Project created successfully!');
    }

    public function index()
    {
      $projects=Project::where('user_id',Auth::user()->id)->get();
        return view('projects.index' , compact('projects'));
    }

    public function edit($id)
    {
        $project = Project::find($id);
        $tasks = $project->tasks()->get();
        $counter = 1 ;
        return view('projects.edit' , compact('project' ,'tasks' ,'counter'));
    }

    public function update($id)
    {
        $project = Project::find($id);
        return view('projects.update' , compact('project'));
    }

    public function save(ProjectUpdateFormRequest $request , $id)
    {
        $project = Project::whereId($id)->firstOrFail();
        $project->project_name = $request->get('name') ;
        if( $request->get('start_date') != null ){
            $project->start_date = $request->get('start_date');
        }
        if( $request->get('end_date') != null ){
            $project->end_date = $request->get('end_date');
        }
        $project->description = $request->get('description');
        if ( $request->get('status') != null ){
            $project->status = FINISHED ;
        } else {
            $today = date('Y/m/d');
            $project->status = $project->end_date > $today ? RUNNING : PASSIVE ;
        }

        $project->save();
        return redirect(action('ProjectController@update' , $id ))->with('status' , 'project updated successfully!');
    }

    public function destroy($id)
    {
        $project = Project::whereId($id)->firstOrFail();
        $project->delete();
        return redirect('project/index')->with('status' , 'Project deleted successfully!');
    }

}
