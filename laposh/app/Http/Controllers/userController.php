<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
class userController extends Controller
{
    public function index()
    {
        $users=User::all();
        return $users;
    }
    public function create()
    {
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $user = User::create($input);
        return $user;
    }

    public function show($id)
    {
        $user=User::find($id);
        $role=$user->role->permission;
        return $user;
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        $user=User::find($id);
        $input =$request->all();
        $user->update($input);
        return $user;
    }
    public function destroy($id)
    {
        User::destroy($id);
        $message="User removed successfully";
        return $message;
    }
}
