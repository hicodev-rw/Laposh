<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleModel as Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
class roleController extends Controller
{

    public function index()
    {
        $users=User::all();
        $roles=Role::all();
        return view('management.static.config')->with('users',$users)->with('roles',$roles);
        return $roles;
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $input=$request->all();
        $role=Role::create($input);
        return $role;
    }
    public function show($id)
    {
        // $role=Role::find($id);
        // $users=$role->users;
        // return $role;

    }

    public function edit($id)
    {
        $user=User::find($id);
        $opermissions = $user->getAllPermissions();
        $permissions=Permission::all();
        return view('management.static.manage_permissions')->with('user',$user)->with('permissions',$permissions)->with('opermissions',$opermissions);
    }


    public function update(Request $request, $id)
    {
        $input=$request->all();
        $role=Role::find($id);
        $role->update($input);
        return $role;        
    }

    public function destroy($id)
    {
        Role::destroy($id);
        $message="Role removed succesfully!";
        return $message;
    }
}
