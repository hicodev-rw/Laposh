<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
class roleController extends Controller
{

    public function index()
    {
        $roles=Role::all();
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
        $role=Role::find($id);
        $users=$role->users;
        return $role;
    }

    public function edit($id)
    {
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
