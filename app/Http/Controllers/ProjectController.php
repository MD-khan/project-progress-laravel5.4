<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Project;
use App\ProjectCategory;
use App\User;
use DB;


class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $projects = Project::get();
           // $projects = DB::table('projects')->paginate(15);
             $totalProjects = Project::count();

            // return $projects;
            return view('projects.index', compact('projects','totalProjects') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function create( User $users)
        {
            $categories = ProjectCategory::all();
            $developers =  $users->getByRole("web_developer");
            $designers =  $users->getByRole("web_designer");
            $site_managers = $users->getByRole("site-manager");
            $clients = $users->getByRole("client");

            return view('projects.create', 
                                compact('categories', 'developers', 'designers', 'site_managers', 'clients')
                             );
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project )
    {
        //dd($request);
        $this->validate($request, [
                'name' => 'required|unique:projects|max:255',
                'category' => 'required | exists:project_categories,id',
                'developers' => 'required | exists:users,id',
                'designers' => 'required | exists:users,id',
                'clients' => 'required | exists:users,id',
                'others_cost' => 'required',
                'design_cost' => 'required',
                'develop_cost' => 'required',
                'deal_price' => 'required',
                'planing_cost' => 'required',
    ]);
        $project->user_id = \Auth::user()->id;
         $project->category_id = $request->input('category');
         $project->name = $request->input('name');
         $project->other_cost = $request->input('others_cost');
         $project->design_cost = $request->input('design_cost');
         $project->develop_cost = $request->input('develop_cost');
         $project->deal_price = $request->input('deal_price');
         $project->planing_cost = $request->input('planing_cost');
         $project->save();

         $perticipents = array_merge($request->developers, $request->designers, $request->clients, $request->site_manager );
         $project->participants()->sync(  $perticipents ,false );
        
        return redirect()->back()
                        ->with('success',' Project has been created  successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, User $users)
    {
      //$model = App\Flight::findOrFail(1);
        $project = Project::findOrFail($id);
        return view('projects.show', compact('project'));
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
}
