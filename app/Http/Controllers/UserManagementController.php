<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    public function roles()
    {
        $userRoles = Role::all();
        return view('pages.roles')->with('userRoles',$userRoles);
    }

    public function add_role()
    {
        return view('pages.roles-add');
    }

    public function update_role($id)
    {
        $role_id = $id;
        $editRoles = Role::all()->where('id', $id);
        foreach($editRoles ?? '' as $editRole){
            $display_name = $editRole->display_name;
            $role = $editRole->description;
        }
        return view('pages.roles-update')->with('display_name', $display_name)->with('role', $role)->with('role_id', $role_id);
    }

    public function users()
    {
        $users = User::all();
        return view('pages.users')->with('users', $users);
    }

    public function add_user()
    {
        $roles = Role::all();
        return view('pages.users-add')->with('roles',$roles);
    }

    public function update_user($id)
    {
        $user_id = $id;
        $editUsers = User::all()->where('id', $id);
        foreach($editUsers ?? '' as $editUser){
            $name = $editUser->name;
            $email = $editUser->email;
            $currentRole = $editUser->role;
        }
        $roles = Role::all()->where('display_name', '!=', $currentRole);
        return view('pages.users-update')->with('name', $name)->with('email', $email)->with('roles', $roles)->with('user_id', $user_id)->with('currentRole', $currentRole);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function role_store(Request $request)
    {
        $this->validate($request, [
            'display_name' => ['required', 'string', 'unique:roles'],
        ]);
        $role = $request->input('display_name');
        $description = $request->input('description');

        $roles = new Role;
        $roles->display_name = $role;
        $roles->description = $description;
        $roles->save();
        return redirect('/roles')->with('success', 'New role added on the list');
    }

    public function user_store(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'string', 'unique:users'],
        ]);
        $name = $request->input('name');
        $email = $request->input('email');
        $role = $request->input('role');

        $user = new User;
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make('secret');
        $user->role = $role;
        $user->save();
        return redirect('/users')->with('success', 'New users added on the list');
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
    public function update(Request $request, $id)
    {
        //
    }

    public function role_update(Request $request, $id)
    {
        $role = $request->input('display_name');
        $description = $request->input('description');     

        $updateRole = Role::find($id);
        $updateRole->display_name = $role;
        $updateRole->description = $description;
        $updateRole->save();
        return redirect('/roles')->with('success', 'Role updated');
    }

    public function user_update(Request $request, $id)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $role = $request->input('role');     

        $users = User::find($id);
        $users->name = $name;
        $users->email = $email;
        $users->role = $role;
        $users->save();
        return redirect('/users')->with('success', 'User updated');
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

    public function role_destroy(Request $request, $id)
    {
        $destroyRole = Role::find($id);
        $destroyRole->delete();
        return redirect('/roles')->with('success', 'Role deleted on the list.');
    }

    public function user_destroy(Request $request, $id)
    {
        $destroyUser = User::find($id);
        $destroyUser->delete();
        return redirect('/users')->with('success', 'User deleted on the list.');
    }
}
