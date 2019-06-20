<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;

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
        return redirect(action('TaskController@create' , $id ))->with('status' , 'Task created successfully!');
    }
}
