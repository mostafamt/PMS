<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Task;
use App\Subtask;
use App\Project;
use App\Subtaskuser;
use App\User;






class subtaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        $user = User::whereId($user_id)->firstOrFail();
        $subtasks = $user->subtasks()->get();
        $counter = 1 ;
        $length = count($subtasks);
        return view('subtask.index' , compact('subtasks','counter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $task=Task::find($id);
        return view('subtask.create',compact('task'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required',
        ]);

       $task=Task::find($id);
       $project=Project::where('id',$task->project_id)->first();

       $subtask=new Subtask();
       $subtask->name=$request->input('name');
       $subtask->start_date=$request->input('start_date');
       $subtask->end_date=$request->input('end_date');
       $subtask->description=$request->input('description');
       $subtask->task_id=$task->id;
       $username = $request->input('username');
       $user = User::where('user_name' , $username)->firstOrFail();
       $user_id = $user->id ;
       $subtask->user_id = $user->id ;
       $subtask->save();
       return redirect(action('TaskController@edit' , [ 'project_id' => $project->id , 'task_id' => $task->id ]))->with('status' , 'Sub Task'.'  ' .$request->input('name') . '  ' .'created successfully!');
    }
      public function Running(Request $request,$id )
    {
        $subtask=Subtask::find($id);
        $task=Task::where('id',$subtask->task_id)->first();

        if($task->status!='waiting'){
           $subtask->Status=$request->input('status');
           $subtask->save();
           return back()->with('status' , 'Sub Task ' .$subtask->name.' now Running');

        }else{
                       return back()->with('status' , 'Task ' .$task->name.' now Waiting');


        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subtask=Subtask::find($id);
        $user_has_id = $subtask->user->id ;
        $logged_user = Auth::user()->id ;
        $is_subtask_belongs_to_this_employee = false ;
        if( $user_has_id == $logged_user ){
            $is_subtask_belongs_to_this_employee = true ;
        }

        return view('subtask.show',compact('subtask','is_subtask_belongs_to_this_employee'));
    }


     public function usertask($id)
    {
        $task=Subtask::find($id);
        return view('subtask.taskuser',compact('task'));
    }

     public function saveUserTask(Request $request,$id)
    {
        $request->validate([
            'username' => 'required',
            'description' => 'required',
        ]);
         $subtaskusers=new Subtaskuser;
      $username=$request->input('username');
      $user=User::where('user_name',$username)->first();
      if($user){

         $subtaskusers->user_id=$user->id;
         $subtaskusers->subtask_id=$request->input('task');
         $subtaskusers->description=$request->input('description');

         $subtaskusers->save();
      return redirect(route('subtask_show' , $id))->with('status' ,'User'. '  '. $username . 's added successfully');


     }else{
         //return redirect(action('TaskController@edit' , [ 'project_id' => $project->id , 'task_id' => $task->id ]))->with('status' , 'Sub Task'.'  ' .$request->input('name') . '  ' .'created successfully!');
      return redirect(route('subtask_user' , $id ))->with('danger' , 'User'. '  '. $username .' not Exist');
     }




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

    public function finish(Request $request,$id)
    {
        $subtask = Subtask::whereId($id)->firstOrFail();
        if ( $request->get('status') != null ){
            $subtask->Status = 'Finished' ;
            $subtask->save();
            return redirect( route('subtask_show' , $id) )->with('status' , 'Awesome , Thank you for your great job!');
        } else {
            $subtask->Status = 'Running' ;
            $subtask->save();
            return redirect( route('subtask_show' , $id) )->with('status' , 'This subtask has not finished yet!');
        }
    }
}
