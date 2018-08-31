<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use  App\Project;

use App\User;

use App\Task;


class ProjectTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( User $user, Project $project)
    {
        //$project->corporateParticipants());

        return view('tasks.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( User $user,  Project $project ) 
    {
            $tasks = $user->taskForProject($project);
            return view('tasks.create' , compact('project' , 'user' , 'tasks') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user, Project $project )
    {
      
        $this->validate($request, [
                'name' => 'required|unique:tasks|max:255 | min:3'
    ]);

        //  dd($request->all() );

        //dd($project->isBelonsTo($user));

        if ( ! $project->isBelonsTo($user) ) {
               return view('errors.403');
           }


        $task = new Task;
        $task->name = $request->name;
        $task->description = $request->description;
        $task->project_id = intval($project->id);
        $task->create_by = intval(\Auth::user()->id);
        $task->create_for = intval($user->id);
        $task->task_file_id = 1;

        $task->save();

      return redirect()->back()
                        ->with('success',' Task has been created  successfully');
    }


    public function complete( Request $request )
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $user_id, $project_id, $task_id )
    {
        $task = Task::find($task_id);

        if ( $task->complete == false ) {
                $task->complete = true;
                $task->update([ 
                        'complete' => $task->complete
                    ]);
                return redirect()->back()
                        ->with('success',' Task has been created  successfully');
        } 
        else {
                $task->complete = false;
                $task->update([ 
                        'complete' => $task->complete
                    ]);
                return redirect()->back()
                        ->with('success',' Task has been created  successfully');
        }
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
}
