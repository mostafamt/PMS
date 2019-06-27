<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;
use App\User;
use App\Subtask;



class TaskController extends Controller
{
    //

    public function create($id)
    {
        $project = Project::whereId($id)->firstOrFail();
        $tasks=Task::where('project_id',$project->id)->get();
        return view('tasks.create' , compact('project','tasks'));
    }

    public function store($id , Request $request)
    {
      $request->validate([
    'name' => 'required',
    'start_date' => 'required',
    'end_date' => 'required',
    'description' => 'required',

]);
      $project=Project::find($id);

      if($request->input('dep_1')==$request->input('dep_2')&&$request->input('dep_2')!=null){
            return back()->with('status' , 'oops dependence_1 is the same dependence_2 ');

      }else{


       $task=new Task();
       $task->name=$request->input('name');
       $task->start_date=$request->input('start_date');
       $task->end_date=$request->input('end_date');
       $task->dependence1=$request->input('dep_1');
       $task->dependence2=$request->input('dep_2');
       $task->project_id=$project->id;
       $task->description=$request->input('description');

        $task->save();
        return redirect(action('ProjectController@edit' , $id ))->with('status' , 'Task created successfully!');
    }
  }


    public function edit($project_id , $task_id)
    {
      $counter=1;
        $task=Task::where('id', $task_id)->first();
        $subtask=Subtask::where('task_id', $task_id)->get();

        $project=Project::where('id',$project_id)->first();

        return view('tasks.edit',compact('task','project','subtask','counter'));
    }



     public function Running(Request $request,$id )
    {
  $task=Task::find($id);
      $dep1=$task->dependence1;
      $dep2=$task->dependence2;

      $task_1=Task::where('id',$dep1)->first();
      $task_2=Task::where('id',$dep2)->first();


     if($dep1&&$dep2){
         if($task_1->status=='Finished'&&$task_2->status=='Finished'){
           $task->status=$request->input('status');
           $task->save();
           return back()->with('status' , 'Task ' .$task->name.' now Running');

         }else{

           return back()->with('status' , 'oops  Task '.$task_1->name.' '.'and '.$task_2->name.' '.'not finished');
         }

      }elseif($dep1){
        if($task_1->status=='Finished'){
           $task->status=$request->input('status');
           $task->save();
           return back()->with('status' , 'Task ' .$task->name.' now Running');        }
         else{

            return back()->with('status' , 'oops  Task '.$task_1->name.' not finished');

        }

      }elseif($dep2){
         if($task_2->status=='Finished'){
           $task->status=$request->input('status');
           $task->save();
           return back()->with('status' , 'Task ' .$task->name.' now Running');
         }else{
             return back()->with('status' , 'oops  Task '.$task_2->name.' not finished');

        }

      }else{
        $task->status=$request->input('status');
         $task->save();
           return back()->with('status' , 'Task ' .$task->name.' now Running');

      }
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
      $project = Project::where('id',$task->project_id)->first();

      $user=User::where('user_name',$username)->first();


        // dd($project);


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
            return redirect(route('addsupervisor' , $task->id ))->with('danger' , 'super Visor not Exist');
        }
    }

    public function index($user_id)
    {
        $user = User::whereId($user_id)->firstOrFail();
        $tasks = $user->tasks()->get();
        $counter = 1 ;
        $length = count($tasks);
        // dd($length);
        return view('tasks.index' , compact('tasks','counter'));
    }

}
