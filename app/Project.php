<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = ['project_name' , 'start_date' , 'end_date' , 'description'];
}
