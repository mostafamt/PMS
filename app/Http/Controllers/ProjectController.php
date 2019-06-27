<?php

namespace App\Http\Controllers;

use App\Project ;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProjectUpdateFormRequest;
use App\Http\Requests\ProjectCreateFormRequest;

define('PASSIVE' , 'Passive');
define('RUNNING' , 'Running');
define('FINISHED', 'Finished');

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
        $time_to_finish = array();
        $today = date('Y-m-d');
        foreach($projects as $project){
            if( $project->status == FINISHED ){
                array_push($time_to_finish,'-');
            } elseif( $today < $project->end_date ){
                $datetime1 = new \DateTime($today);
                $datetime2 = new \DateTime($project->end_date);
                $interval = $datetime1->diff($datetime2);
                $days = $interval->format('%d');
                $months = $interval->format('%m');
                $years = $interval->format('%y');
                if($years){
                    array_push($time_to_finish , 'Finish in : '.$years.' year ,'.$months.' month ,'.$days.' days');
                } else {
                    if( $months ){
                        array_push($time_to_finish , $interval->format('Finish in : '.$months.' month ,'.$days.' days'));
                    } else {
                        array_push($time_to_finish , $interval->format('Finish in : '.$days.' days'));
                    }
                }
                $project->status = RUNNING ;
            } else {
                $datetime1 = new \DateTime($today);
                $datetime2 = new \DateTime($project->end_date);
                $interval = $datetime1->diff($datetime2);
                $days = $interval->format('%d');
                $months = $interval->format('%m');
                $years = $interval->format('%y');
                if($years){
                    array_push($time_to_finish , 'Finished From : '.$years.' year ,'.$months.' month ,'.$days.' days ago');
                } else {
                    if( $months ){
                        array_push($time_to_finish , $interval->format('Finished From : '.$months.' month ,'.$days.' days ago'));
                    } else {
                        array_push($time_to_finish , $interval->format('Finished From : '.$days.' days ago'));
                    }
                }
                $project->status = PASSIVE ;
            }
        }
        $length = count($projects);
        return view('projects.index' , compact('projects','time_to_finish','length'));
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
            $project->status = $project->end_date < $today ? RUNNING : PASSIVE ;
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
