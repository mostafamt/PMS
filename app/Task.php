<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = ['name' , 'start_date' , 'end_date' , 'description' , 'project_id'];
}
