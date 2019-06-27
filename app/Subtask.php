<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subtask extends Model
{
    //
    protected $fillable = ['name' , 'start_date' , 'end_date' , 'description' , 'status' , 'task_id' , 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
