<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project ;
use Illuminate\Support\Facades\Auth;


class ProjectController extends Controller
{
    //

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        if ( $request->get('start_date')< $request->get('end_date') ) {
            $project=new Project();
            $project->user_id=Auth::user()->id;
            $project->project_name=$request->input('name');
            $project->description=$request->input('description');
            $project->start_date=$request->input('start_date');
            $project->end_date=$request->input('exnd_date');

            $project->save();
        return redirect('/project/create')->with('status' , 'Project created successfully!');
        }else{
    return redirect('/project/create')->with('status' , 'Project not created successfully because end date > start date!');
}

    }

    public function index()
    {
      $projects=Project::where('user_id',Auth::user()->id)->get();

        //$projects = Project::all();
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
                if($request->get('start_date')< $request->get('end_date')){

        $project = Project::find($slug);
        $project->project_name = $request->get('name') ;
        $project->start_date = $request->get('start_date');
        $project->end_date = $request->get('end_date');
        $project->description = $request->get('description');
        $project->save();

        return redirect(action('ProjectController@update' , $slug ))->with('status' , 'The project updated successfully!');
}else{
    return 'nooooooooooo';
}
    }

    public function destroy($slug)
    {
        $project = Project::find($slug);
        $project->delete();
        return redirect('project/index')->with('status' , 'Project deleted successfully!');
    }

}
