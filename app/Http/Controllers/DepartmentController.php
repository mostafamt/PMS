<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department ;

class DepartmentController extends Controller
{
    //
    public function create()
    {
        return view('department.create');
    }

    public function store(Request $request)
    {
        $department = new Department(array(
            'name' => $request->name ,
            'description' => $request->description ,
        ));
        $department->save();

        return redirect('department/create')->with('status' , 'Department created successfully!');
    }

    public function index()
    {
        $departments = Department::all();
        $counter = 1 ;
        return view('department.index' , compact('departments' , 'counter'));
    }

    public function edit($slug)
    {
        $department = Department::find($slug);
        return view('department.edit' , compact('department'));
    }

    public function update($slug)
    {
        $department = Department::find($slug);
        return view('department.update' , compact('department'));
    }

    public function save(Request $request , $slug)
    {
        $department = Department::find($slug);
        $department->name = $request->get('name');
        $department->description = $request->get('description');
        $department->save();

        return redirect(action('DepartmentController@update' , $slug ))->with('status' , 'Department updated successfully!');
    }

    public function destory($slug)
    {
        $department = Department::find($slug);
        $department->delete();
        return redirect('departments')->with('status' , 'Department deleted successfully!');
    }
}
