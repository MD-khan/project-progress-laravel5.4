<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;


class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'phone', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isActive()
    {
        return $this->active;
    }

    /*
        Get total users
     */
    public function totalUsers()
    {
        return $this->count();
    }

/*
    Relationship with   
 */
    public function projects()
    {
        return $this->belongsToMany ( Project::class );
    }

    

    //  Retrive users by role  
        public function getByRole( $name)
            {
                return $this->whereHas('roles', function($query) use ($name){
                    $query->where('name',   $name);
                })->get();
        }


        // Task
        public function tasks()
        {
           // $user->project->tasks
            return $this->hasMany(Task::class, 'create_for');
        }

        // task for an individual project 
        public function taskForProject( Project $project )
        {
                return Task::where('project_id', $project->id)->where('create_for', $this->id)->get();
        }
        
            
        //  Total Task 
        public function totalTasks()
        {
          return $this->tasks->count();
        }


    

}
