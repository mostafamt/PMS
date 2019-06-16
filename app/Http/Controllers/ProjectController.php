<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project ;

class ProjectController extends Controller
{
    //

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $project = new Project(array(
            'project_name' => $request->name ,
            'description' => $request->description ,
            'start_date' => $request->start_date ,
            'end_date' => $request->end_date ,
        ));
        $project->save();
        return redirect('/project/create')->with('status' , 'Project created successfully!');
    }

    public function index()
    {
        $projects = Project::all();
        return view('projects.index' , compact('projects'));
    }

    public function edit($id)
    {
        $project = Project::find($id);
        return view('projects.edit' , compact('project'));
    }

    public function update($id)
    {
        $project = Project::find($id);
        return view('projects.update' , compact('project'));
    }

    public function save(Request $request , $slug)
    {
        $project = Project::find($slug);
        $project->project_name = $request->get('name') ;
        $project->start_date = $request->get('start_date');
        $project->end_date = $request->get('end_date');
        $project->description = $request->get('description');
        $project->save();

        return redirect(action('ProjectController@update' , $slug ))->with('status' , 'The project updated successfully!');
    }

    public function destroy($slug)
    {
        $project = Project::find($slug)->firstOrFail();
        $project->delete();
        return redirect('project/index')->with('status' , 'Project deleted successfully!');
    }

}
