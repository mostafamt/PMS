<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;
use App\User;


class TaskController extends Controller
{
    //

    public function create($id)
    {
        $project = Project::whereId($id)->firstOrFail();
        return view('tasks.create' , compact('project'));
    }

    public function store($id , Request $request)
    {


        $task = new Task(array(
            'name' => $request->get('name') ,
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date') ,
            'description' => $request->get('description') ,
            'project_id' => $id ,
        ));
        $task->save();
        return redirect(action('ProjectController@edit' , $id ))->with('status' , 'Task created successfully!');
    }


    public function edit($project_id , $task_id)
    {

        return view('tasks.edit');
    }
    public function addsupervisor($id )
    {
           $task = Task::whereId($id)->firstOrFail();
           $project = Project::where('id',$task->project_id)->first();
           $user=User::all();

           return view('tasks.addsupervisor' , compact('project','task'));
    }
       public function savesupervisor(Request $request,$id )
    {
      $task=Task::find($id);
      $username=$request->input('supervisor');
      $user=User::where('user_name',$username)->first();
      if($user){

         $task->name=$request->input('name');
         $task->start_date=$request->input('start_date');
         $task->end_date=$request->input('end_date');
         $task->project_id=$request->input('project');
         $task->description=$request->input('desc');
         $task->user_id=$user->id;
         $task->save();
      return redirect(route('project.show' , $request->input('project') ))->with('status' , 'super Visor added successfully');


     }else{
        return redirect(route('project.show' , $request->input('project') ))->with('status' , 'super Visor not Exist');
     }
        




    }
  
}
