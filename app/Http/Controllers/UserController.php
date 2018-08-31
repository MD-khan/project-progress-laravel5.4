<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Role;
Use App\DB;
use Entrust;

class UserController extends Controller
{
    /**
     * Display a listing of the users .
     *
     * @return \Illuminate\Http\Response
     */    



    public function __construct()
    {

         $this->middleware('auth');
         return response()->view('errors.403');
    }



    public function index()
    {
        $users = User::get();
        $totalUsers = User::count();
        return view('users.index', compact( 'users', 'totalUsers' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('users.create', compact('roles') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
             'roles' => 'required',
             'phone'   => 'required|regex:/[0-9]{10}/|unique:users',
             'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:1|confirmed',
        ]);

        $user =User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        foreach ($request->input('roles') as $key => $role) {
            $user->attachRole($role);
        }

        return redirect()->back()
                        ->with('success','User has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findorFail($id);
        $roles = Role::get();
        return view ('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
             'roles' => 'required',
            'phone'        => 'regex:/[0-9]{10}/',
            'email' => 'required|email|max:255',
             'password' => 'same:password_confirmation',
        ]);
        
     
        $input = $request->all();

      if( !empty($input['password'])  ){ 
            $input['password'] = bcrypt($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }

        $user = User::findOrFail($id);

        $user->update($input);

        \DB::table('role_user')->where('user_id',$id)->delete();

        
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }
    
         return redirect()->back()
                        ->with('success','User has been updated');
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
