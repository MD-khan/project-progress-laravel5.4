<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

protected $fillable = ['name', 'description', 'complete'];

    public function project()
    {
    	return $this->belongsTo(Project::class);
    }

// Task Creator 
    public function createBy()
    {
    	return $this->belongsTo(User::class, 'create_by');
    }

    //Task Create for
    public function createFor()
    {
    	return $this->belongsTo(User::class, 'create_for');
    }

    public function isComplete()
    {
        return $this->completed();   
    }

     public function completed ()
     {
         return $this->complete;
     }


}
