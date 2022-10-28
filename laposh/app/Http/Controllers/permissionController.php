<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
class permissionController extends Controller
{
    public function index()
    {
        $permissions=Permission::all();
        return $permissions;
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $input=$request->all();
        $permission=Permission::create($input);
        return $permission;
    }

    public function show($id)
    {
        $permission=Permission::find($id);
        $role=$permission->role;
        return $permission;
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        $permission=Permission::find($id);
        $input =$request->all();
        $permission->update($input);
        return $permission;
    }

    public function destroy($id)
    {
        Permission::destroy($id);
        $message="permission removed succesfully!";
        return $message;
    }
}
