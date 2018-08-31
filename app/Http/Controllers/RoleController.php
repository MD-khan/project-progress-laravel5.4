<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Permission;
use App\Role;


class RoleController extends Controller
{
    /**
     * Display a listing of the  role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role:: all();
        $number = 1; //  showing the sequence number of the role on the view 
        return view('roles.index' ,compact('roles', 'number') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();
        $permissions->all();
        return view('roles.create', compact('permissions') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Role $role )
    {

        //return $request->all();

        $this->validate($request, [
                'name' => 'required|unique:roles|max:255',
                'display_name' => 'required|unique:roles|max:255',
                'description' => 'required',
                'permissions' => 'required',
    ]);

        //$role = new Role();
            $role->name = $request->input('name');
            $role->display_name = $request->input('display_name');
            $role->description = $request->input('description');
            $role->save();

         foreach ($request->input('permissions') as $key => $permission) {
                         $role->attachPermission($permission);
            }

       return redirect()->back()
                        ->with('success','Role has been created  successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findorFail($id);
        return view('roles.show', compact('role') ); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findorFail($id);
        $permissions = Permission::get();

        //Collect Role Permission ids 
        $rolePermissions = array();
            foreach ($role->perms as $key => $rolePermission) {
                $rolePermissions[] = $rolePermission->id;
            }
        return view('roles.edit', compact('role', 'permissions', 'rolePermissions') );
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
          $this->validate($request, [
            'display_name' => 'required',
            'description' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->save();

        \DB::table("permission_role")->where("permission_role.role_id",$id)
            ->delete();

        foreach ($request->input('permission') as $key => $value) {
            $role->attachPermission($value);
        }

        return redirect()->back()
                        ->with('success','Role has been updated successfully');
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
