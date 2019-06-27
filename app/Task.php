<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = ['name' , 'start_date' , 'end_date' , 'description' , 'project_id'];

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function User()
    {
        return $this->belongsTo('App\User');
    }

}
